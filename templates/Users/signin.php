<?php

$this->assign('title', 'SIGN UP');

?>

<?php
echo "
        {$this->Form->create($userEntity)}

        {$this->Form->control('first_name', ['label' => 'prénom : '])}

        {$this->Form->control('last_name', ['label' => 'nom : '])}

        {$this->Form->control('email', ['label' => 'email : '])}

        {$this->Form->control('password', ['label' => 'mot de passe : '])}

        {$this->Form->button("S'inscrire",['class' => 'nice_button'])}

        {$this->Form->end()}
    ";
?>

