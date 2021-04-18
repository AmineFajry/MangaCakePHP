<?php

$this->assign('title', 'Manga SHOW');

echo "
<ul>
    <li>
        {$this->Html->image('mangas_img/' . $mangaEntity->slug_name.'.jpg', array('class'=> 'img-show'))}
    </li>

    <li>
        name : {$mangaEntity->name}
    </li>
    <li>
        description : {$mangaEntity->description}
    </li>
    <li>
        Age : {$mangaEntity->age_conseille}
    </li>
    <li>
        download : {$this->Html->link('click here', 'img/mangas_img/' .$mangaEntity->slug_name.'.jpg',array('download'=>$mangaEntity->slug_name,'class'=>''))}
    </li>
    <li>

    {$this->Form->create(null,  ['url' => ['controller' => 'Mangas', 'action' => 'delete', '/'.$mangaEntity->id]])}



    {$this->Form->button('DELETE')}

    {$this->Form->end()}

    </li>
</ul>
";

?>

<?php

foreach ($mangaEntity->comments as $comment):
?>

<p>Comments :
    <?= $comment->content ?>
</p>
<?php
endforeach;
?>



<?= $this->Form->create(null,['url' => ['controller' => 'Comments','action' => 'add' , $mangaEntity->id]]) ?>
<?= $this->Form->control('content', ['label' => 'Comment : ']) ?>
<?= $this->Form->button('ajouter') ?>
<?= $this->Form->end() ?>

<?php

foreach ($mangaEntity->friends as $friend):
    ?>

    <p>Friends :
        <?= $friend->last_name?>
        <?= $friend->first_name?>
    </p>
<?php
endforeach;
?>


<?= $this->Form->create(null,['url' => ['controller' => 'Friends','action' => 'send' , $mangaEntity->id]]) ?>

<?php
echo "


{$this->Form->select('field', $friendsTab,['label' => 'types : '])}
";

?>

<?= $this->Form->control('favoris', ['label' => 'Favoris to Friends: ']) ?>
<?= $this->Form->button('send') ?>
<?= $this->Form->end() ?>




