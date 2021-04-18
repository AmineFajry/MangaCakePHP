<?php

    $this->assign('title', 'ADD IMAGE');

?>

<h1>Ajouter un manga :</h1>

<?php
    echo "
        {$this->Form->create($mangaEntity, ['type' => 'file'])}

        {$this->Form->file('submittedfile')}

        {$this->Form->control('name', ['label' => 'Name : '])}

        {$this->Form->control('age_conseille', ['label' => 'Age conseillé : '])}

        {$this->Form->control('description', ['label' => 'Description : '])}

        {$this->Form->button('Submit')}

        {$this->Form->end()}
    ";
?>


