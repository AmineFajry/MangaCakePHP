<?php

namespace App\Model\Entity;

use Authentication\PasswordHasher\DefaultPasswordHasher;
use Cake\ORM\Entity;

use Cake\Utility\Text;

class Friend extends Entity{

    protected function _setSlug_full_name(string $full_name)
    {
        return Text::slug($full_name);
    }
    
    protected function _getFull_name(){
        return $this->first_name . ' ' . $this->last_name;
    }

}

