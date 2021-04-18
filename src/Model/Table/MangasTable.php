<?php

namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class MangasTable extends Table{

    public function initialize(array $config):void
    {
        parent::initialize($config);
        $this->hasMany('Users'); //Manga can have multiple Users
        $this->hasMany('Genres'); //Manga can have multiple Genres
        $this->hasMany('Authors'); //Manga has many authors
        $this->hasMany('Comments'); //Manga can have multiple Comments
        $this->hasMany('Friends');

    }
}
