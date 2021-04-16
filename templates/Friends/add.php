<?php

    $this->assign('title', 'ADD IMAGE');

?>

<h1>Ajouter un ami :</h1>

<?php
    echo "
        {$this->Form->create($friendEntity, ['type' => 'file'])}

        {$this->Form->file('submittedfile')}

        {$this->Form->control('first_name', ['label' => 'prénom : '])}

        {$this->Form->control('last_name', ['label' => 'nom : '])}

        {$this->Form->control('description', ['label' => 'Description : '])}

        {$this->Form->button('Submit')}

        {$this->Form->end()}
    ";
?>

