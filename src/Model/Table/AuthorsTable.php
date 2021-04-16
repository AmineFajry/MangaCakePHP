<?php


namespace App\Model\Table;


use Cake\ORM\Table;

class AuthorsTable extends Table
{

    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->belongsTo('Manga'); //Many Authors belong to Manga

    }
}
