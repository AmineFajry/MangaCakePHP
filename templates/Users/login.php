<div class="align-center">
<?php
$this->assign('title', 'Page - Login');
$this->assign('description', 'petite description pour la page login');
$this->layout = 'mini';

/** @var \App\Model\Entity\User $userEntity */
echo "
    {$this->Form->create($userEntity)}

    {$this->Form->control('email', [
    'label' => 'Votre adresse email',
    'class' =>'form-control'
    ])}

    {$this->Form->control('password', [
        'label' => 'Votre mot de passe',
        'class' =>'form-control'
    ])}






    {$this->Form->button('se connecter', ['class' => 'nice_button'])}
    {$this->Html->link(
        "s'inscrire",
        array(
            'controller'=>'Users',
            'action'=>'signin'
        ),
        array(
            'class' => 'nice_button',
            'title' => 'inscription'
        ))}
    {$this->Form->end()}
    ";
?>
</div>
