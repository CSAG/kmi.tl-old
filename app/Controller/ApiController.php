<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Chokchai
 * Date: 10/14/13
 * Time: 6:17 PM
 * To change this template use File | Settings | File Templates.
 */

App::uses('AppController', 'Controller');

/**
 * Class ApiController
 * @property Url $Url
 * @property UrlShortenerComponent $UrlShortener
 */
class ApiController extends AppController {

    public $components = array('RequestHandler', 'UrlShortener');
    public $uses = array('Url');

    private $urlPreg = '/((([A-Za-z]{3,9}:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)((?:\/[\+~%\/.\w-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[\w]*))?)/';

    public function get(){

        $url = $this->request->query('url');

        if(preg_match($this->urlPreg, $url)){

            $response = $this->generateShortenUrl($url);

            $this->set($response);
            $this->set('_serialize', array('url', 'alias', 'info', 'qr', 'counter'));

        } else {
            $this->set(array('error'=>true, 'error_message'=>'invalid url', 'url'=>$url));
            $this->set('_serialize', array('error', 'error_message', 'url'));
        }
    }

    public function info(){

        $gUrl = $this->request->query('url');

        if(strpos($gUrl, Router::url('/', true)) !== false){
            $url = $this->getUrl(str_replace(Router::url('/', true), '', $gUrl));
        } else {
            $this->Url->recursive = -1;
            $url = $this->Url->findByUrl($gUrl);
        }

        // is url and is kmi.tl url
        if(preg_match($this->urlPreg, $gUrl) && !empty($url)){

            $response = array(
                'url' => $url['Url']['url'],
                'alias' => Router::url("/{$url['Url']['alias']}", true),
                'info' => Router::url("/{$url['Url']['alias']}.info", true),
                'qr' => Router::url("/{$url['Url']['alias']}.qr", true),
                'counter' => (int) $url['Url']['counter'],
            );

            $this->set($response);
            $this->set('_serialize', array('url', 'alias', 'info', 'qr', 'counter'));

        } else {
            $this->set(array('error'=>true, 'error_message'=>'invalid url or url not found', 'url'=>$gUrl));
            $this->set('_serialize', array('error', 'error_message', 'url'));
        }
    }

    public function test_get(){
        $url = 'http://www.kmitl.ac.th';
        $response = file_get_contents(Router::url('/api/get.json?url=',true).$url);
        $response = json_decode($response, true);
        echo '<h3>GET SUCCESS</h3>';
        var_dump($response);

        $url = 'kmitl.ac.th';
        $response = file_get_contents(Router::url('/api/get.json?url=',true).$url);
        $response = json_decode($response, true);
        echo '<h3>GET FAIL</h3>';
        var_dump($response);

        exit();
    }

    public function test_info(){
        $url = 'http://www.kmitl.ac.th';
        $response = file_get_contents(Router::url('/api/info.json?url=',true).$url);
        $response = json_decode($response, true);
        echo '<h3>GET SUCCESS</h3>';
        var_dump($response);

        $url = 'kmitl.ac.th';
        $response = file_get_contents(Router::url('/api/info.json?url=',true).$url);
        $response = json_decode($response, true);
        echo '<h3>GET FAIL</h3>';
        var_dump($response);

        exit();
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
        $counter = 0;

        $res = $this->Url->findByUrl($url);

        // if exist return old one
        if(!empty($res)){

            $alias = $res['Url']['alias'];
            $counter = $res['Url']['counter'];

        } else {

            $alias = $this->UrlShortener->generateRandomString(6);

            // generate until is unique
            while ($this->Url->exists($alias)) {
                $alias = $this->UrlShortener->generateRandomString(6);
            }

            // save to database
            $this->Url->create();
            $this->Url->save(array(
                'url' => $url,
                'alias' => $alias,
                'create_date' => date('Y-m-d H:i:s'),
                'counter' => $counter
            ));

        }

        // return response
        return array(
            'url' => $url,
            'alias' => Router::url("/{$alias}", true),
            'info' => Router::url("/{$alias}.info", true),
            'qr' => Router::url("/{$alias}.qr", true),
            'counter' => (int) $counter
        );
    }

}