<?php

namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class FriendsTable extends Table{

    public function initialize(array $config):void
    {
        parent::initialize($config);
    }
}