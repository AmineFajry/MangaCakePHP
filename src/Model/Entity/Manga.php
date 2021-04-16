<?php

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

use Cake\Utility\Text;

class Manga extends Entity{

    protected function _setSlug_name(string $name)
    {
        return Text::slug($name);
    }
}