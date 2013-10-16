<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @property Url $Url
 * @property User $User
 * @property Request $Request
 * @property UrlShortenerComponent $UrlShortener
 * @property RecaptchaComponent $Recaptcha
 *
 */
class PagesController extends AppController
{
    public $uses = array('Url', 'User', 'Request');
    public $components = array('RequestHandler', 'UrlShortener', 'Recaptcha.Recaptcha');
    public $helpers = array('Recaptcha.Recaptcha');
    public $layout = 'kmi.tl';

    public function index()
    {
        $this->set('title_for_layout', 'KMI.TL Url Shortener');
    }

    public function api()
    {
        $this->set('title_for_layout', 'KMI.TL API');
    }

    public function request_custom_url()
    {
        $this->set('title_for_layout', 'Request Custom Url');

        if($this->request->is('post')){
            if ($this->Recaptcha->verify()) {

                $data = $this->request->data;
                $data['Request']['approved'] = 0;
                $data['Request']['datetime'] = date('Y-m-d H:i:s');

                if($this->Request->save($data)){

                    // send email to admin
                    $adminEmail = $this->User->find('list', array(
                        'fields' => array('User.email'),
                        'conditions'=>array('role'=>'admin')
                    ));

                    $siteUrl = Router::url('/', true);

                    $Email = new CakeEmail('gmail');
                    $Email->emailFormat('html')
                        ->to($adminEmail)
                        ->subject("[KMI.TL] Request for {$siteUrl}{$data['Request']['alias']}")
                        ->send(
                            "<b>Request for `{$data['Request']['url']}` to {$siteUrl}{$data['Request']['alias']}</b><br/><br/>

                             Requested Information<br/>
                             <b>Name:</b> {$data['Request']['name']}<br/>
                             <b>Email:</b> {$data['Request']['email']}<br/>
                             <b>Url:</b> {$data['Request']['url']}<br/>
                             <b>Alias:</b> {$siteUrl}{$data['Request']['alias']}<br/>
                             <b>Datetime:</b> {$data['Request']['datetime']}<br/><br/>

                             <b>Approve link:</b> {$siteUrl}admin/approve/{$data['Request']['alias']}<br/><br/>

                             PS. This email send by automatic system from {$siteUrl}. If you have any question, contact me at csag@kmi.tl"
                        );

                    $this->Session->setFlash('Your request is completed. Please be patient until it is approved by KMI.TL staffs.
    We will inform you with any futher update. <span class="glyphicon glyphicon-heart"></span>', 'flash/success');

                    $this->redirect(array('action'=>'request_custom_url'));
                }
            } else {
                $this->Session->setFlash($this->Recaptcha->error, 'flash/danger');
            }

        }
    }

    public function custom_url()
    {
        $this->set('title_for_layout', 'Custom Url');

        $CustomUrls = $this->Url->find('all', array(
            'conditions' => array('Url.user_id >' => 0),
            'order' => 'Url.alias'
        ));

        $this->set(compact('CustomUrls'));
    }

    public function jump($alias)
    {
        $result = $this->getUrl($alias);
        if ($result) {

            $url = $result['Url']['url'];

            // update counter
            $this->Url->id = $result['Url']['id'];
            $this->Url->save(array(
                'counter' => $result['Url']['counter'] + 1
            ));

            // add http if needed
            if (strpos($url, 'http') !== 0 && strpos($url, 'ftp') !== 0) {
                $url = 'http://' . $url;
            }

            // permanent redirect
            $this->redirect($url, 301);

        } else {
            throw new NotFoundException();
        }
    }

    public function info($alias)
    {
        $this->set('title_for_layout', 'Info '.Router::url("/${alias}", true));

        $url = $this->getUrl($alias);
        if($url){
            $this->set($url);
        } else {
            throw new NotFoundException();
        }

    }

    public function qr($alias)
    {
        // permanent redirect
        $url = Router::url("/${alias}", true);
        $this->redirect($this->UrlShortener->getQRcodeUrl($url), 301);
    }

    public function ajax_add_url()
    {
        if ($this->request->is('post')) {

            $response = $this->generateShortenUrl($this->request->data('url'));

            $this->set($response);
            $this->set('_serialize', array('url', 'alias', 'info', 'qr'));
        } else {

            throw new NotFoundException();
        }
    }

    private function getUrl($alias)
    {
        $this->Url->recursive = -1;
        $result = $this->Url->findByAlias($alias);

        if (!empty($result)) {
            return $result;
        }

        return false;
    }

    private function generateShortenUrl($url){

        $this->Url->recursive = -1;

        $res = $this->Url->findByUrl($url);

        // if exist return old one
        if(!empty($res)){

            $alias = $res['Url']['alias'];

        } else {

            $alias = $this->UrlShortener->generateRandomString(5);

            // generate until is unique
            while ($this->Url->exists($alias)) {
                $alias = $this->UrlShortener->generateRandomString(5);
            }

            // save to database
            $this->Url->create();
            $this->Url->save(array(
                'url' => $url,
                'alias' => $alias,
                'create_date' => date('Y-m-d H:i:s'),
                'counter' => 0
            ));

        }

        // return response
        return array(
            'url' => $url,
            'alias' => Router::url("/{$alias}", true),
            'info' => Router::url("/{$alias}.info", true),
            'qr' => Router::url("/{$alias}.qr", true),
            'counter' => 0
        );
    }

}