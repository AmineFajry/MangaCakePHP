<?php

namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class FriendsTable extends Table{

    public function initialize(array $config):void
    {
        parent::initialize($config);
        $this->belongsTo('Users'); // Many Friends belongs to a User
        $this->hasMany('Mangas');
    }


}
