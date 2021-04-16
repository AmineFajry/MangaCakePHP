<?php


namespace App\Model\Table;


use Cake\ORM\Table;

class GenresTable extends Table
{

    public function initialize(array $config): void
    {
        parent::initialize($config);
        $this->belongsTo('Mangas'); //Many Genres belongs to a Manga
    }
}
