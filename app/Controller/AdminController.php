<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Chokchai
 * Date: 10/12/13
 * Time: 8:39 PM
 * To change this template use File | Settings | File Templates.
 */

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Class AdminController
 * @property Url $Url
 * @property User $User
 * @property Request $Request
 */
class AdminController extends AppController
{
    public $layout = 'kmi.tl';
    public $uses = array('Url', 'User', 'Request');

    public $components = array(
        'Auth' => array(
            'loginAction' => array(
                'controller' => 'admin',
                'action' => 'login',
            ),
            'authError' => 'Did you really think you are allowed to see that?',
            'loginRedirect' => array(
                'controller' => 'admin',
                'action' => 'index'
            )
        )
    );

    function index()
    {
        $CustomUrls = $this->Url->find('all', array(
            'conditions' => array('Url.user_id >' => 0),
            'order' => 'Url.alias'
        ));

        $RequestUrls = $this->Request->find('all', array(
            'conditions' => array('Request.approved' => 0),
            'order' => 'Request.id DESC'
        ));

        $this->set(compact('CustomUrls', 'RequestUrls'));
    }

    function approve($alias){

        $req = $this->Request->findByAlias($alias);

        if(empty($req)){
            throw new InternalErrorException('Alias `'.Router::url("/{$alias}",true).'` is not found in request list.');
        } else if($req['Request']['approved']){
            throw new InternalErrorException('Alias `'.Router::url("/{$alias}",true).'` is already approve.');
        } else if( ! $req['Request']['approved']){

            // update to approved
            $req['Request']['approved'] = 1;
            $this->Request->save($req);

            // add to url
            $this->Url->create();
            $this->Url->save(array(
                'url' => $req['Request']['url'],
                'alias' => $req['Request']['alias'],
                'counter' => 0,
                'create_date' => date('Y-m-d H:i:s'),
                'user_id' => $this->Auth->user('id')
            ));

            // send email notification
            $data = $req;
            $siteUrl = Router::url('/', true);

            $Email = new CakeEmail('gmail');

            $Email->emailFormat('html')
                ->to($req['Request']['email'])
                ->subject("[KMI.TL] {$siteUrl}{$data['Request']['alias']} has been Approved")
                ->send(
                    "<b>Your request for {$data['Request']['url']} to be {$siteUrl}{$data['Request']['alias']} has been <u>Approved</u>,
                    Thank you for using our services.</b><br/><br/>

                     Requested Information<br/>
                     <b>Name:</b> {$data['Request']['name']}<br/>
                     <b>Email:</b> {$data['Request']['email']}<br/>
                     <b>Url:</b> {$data['Request']['url']}<br/>
                     <b>Alias:</b> {$siteUrl}{$data['Request']['alias']}<br/>
                     <b>Datetime:</b> {$data['Request']['datetime']}<br/><br/>

                     PS. This email send by automatic system from {$siteUrl}. If you have any questions, contact me at csag@kmi.tl"
                );

            $this->Session->setFlash(Router::url("/{$alias}",true).' is Approved', 'flash/success');
            $this->redirect(array('action'=>'index'));
        }
    }

    function reject($alias){

        $req = $this->Request->findByAlias($alias);

        if(empty($req)){
            throw new InternalErrorException('Alias `'.Router::url("/{$alias}",true).'` is not found in request list.');
        } else {

            // delete
            $this->Request->delete($req['Request']['id']);

            $this->Session->setFlash('Reject Success', 'flash/success');
            $this->redirect(array('action'=>'index'));
        }
    }

    function add_url()
    {
        if ($this->request->is('post')) {

            $data = $this->request->data;

            $data['Url'] = am($data['Url'], array(
                'counter' => 0,
                'create_date' => date('Y-m-d H:i:s'),
                'user_id' => $this->Auth->user('id')
            ));

            $this->Url->create();

            if($this->Url->save($data)){
                $this->Session->setFlash("Add Success", 'flash/success');
            } else {
                $this->Session->setFlash(__METHOD__."<pre>".print_r($this->Url->validationErrors, true).'</pre>', 'flash/danger');
            }
        }

        $this->redirect(array('controller' => 'admin', 'action' => 'index'));

    }

    function delete_url($id)
    {
        if($this->Url->exists($id)){

            // delete in requested if exist
            $url = $this->Url->findById($id);
            $this->Request->deleteAll(array(
                'Request.alias' => $url['Url']['alias']
            ));

            // delete in url
            $this->Url->delete($id);

            $this->Session->setFlash("Delete Success", 'flash/success');
        } else {
            $this->Session->setFlash(__METHOD__."<pre>".print_r($this->Url->validationErrors, true).'</pre>', 'flash/danger');
        }

        $this->redirect(array('controller' => 'admin', 'action' => 'index'));
    }

    function login()
    {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirectUrl());
            }
            $this->Session->setFlash('Invalid username or password, try again');
        }
    }

    function logout()
    {
        $this->redirect($this->Auth->logout());
    }

}