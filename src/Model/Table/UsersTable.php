<?php

namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table{

    public function initialize(array $config):void
    {
        parent::initialize($config);
        $this->hasMany('Mangas'); // A User can have multiple mangas
        $this->hasMany('Comments'); //A User can have multiple Comments
        $this->hasMany('Friends'); // A User can have multiple Friends
    }
}
