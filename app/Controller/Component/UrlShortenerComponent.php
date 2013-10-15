<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Chokchai
 * Date: 10/13/13
 * Time: 3:26 PM
 * To change this template use File | Settings | File Templates.
 */

App::uses('Component', 'Controller');

class UrlShortenerComponent extends Component {

    function getQRcodeUrl($url){
        return 'http://chart.apis.google.com/chart?cht=qr&chs=300x300&chl='.$url;
    }

    function generateRandomString($length = 10)
    {
        $characters = '123456789abcdefghijklmnopqrstuvwxyz';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }
}