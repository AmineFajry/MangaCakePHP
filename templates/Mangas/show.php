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
