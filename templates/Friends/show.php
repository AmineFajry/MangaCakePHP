<?php

$this->assign('title', 'Friend SHOW');

echo "
<ul>
    <li>
        {$this->Html->image('friends_img/' . $friendEntity->slug_full_name.'.jpg', array('class'=> 'img-show'))}
    </li>
    <li>
        name : {$friendEntity->full_name}
    </li>
    <li>
        description : {$friendEntity->description}
    </li>
    <li>
        download : {$this->Html->link('click here', 'img/friends_img/' .$friendEntity->slug_full_name.'.jpg',array('download'=>$friendEntity->slug_full_name,'class'=>''))}
    </li>
    <li>
    
    {$this->Form->create(null,  ['url' => ['controller' => 'Friends', 'action' => 'delete', '/'.$friendEntity->id]])}

    {$this->Form->button('DELETE')}

    {$this->Form->end()}

    </li>
</ul>
";

    
    
?>
