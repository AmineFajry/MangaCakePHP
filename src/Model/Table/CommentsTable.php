<?php


namespace App\Model\Table;


use Cake\ORM\Table;

class CommentsTable extends Table
{

    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->belongsTo('Mangas'); //Many Comments belongs to a Manga
        $this->belongsTo('Users'); // Many Comments belongs to a User

    }
}
