<?php
namespace App\View\Helper;

use Cake\Http\Session;
use Cake\View\Helper;

class SessionHelper extends Helper
{
    public function read(string $value) {
        $session = new Session();
        return $session->read($value);
    }

    public function isConnect(){
        $session = new Session();

        if($session->read('Auth.id')){
            return true;
        }else{
            return false;
        }

    }
}
