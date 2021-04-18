<header>
<nav><input id="check-responsiv-nav" type="checkbox" style="display: none;">
    <ul>
        <li><label  id="if-display-responsiv-nav" for="check-responsiv-nav">Menu</label></li>
        <li>
            <?= $this->Html->link(
            'Acceuil',
            ['controller' => 'Mangas', 'action' => 'index'],
            [
                'class' => '',
                'title' => 'HOME PAGE'
            ]
            );?>
        </li>
        <li>
            <?= $this->Html->link(
                'Friends',
                ['controller' => 'Friends', 'action' => 'index'],
                [
                    'class' => '',
                    'title' => 'img'
                ]
            ) ?>
        </li>
        <li>
            <?= $this->Html->link(
                'Mangas',
                ['controller' => 'Mangas', 'action' => 'index'],
                [
                    'class' => '',
                    'title' => 'other'
                ]
            ) ?>
        </li>
        <li>
            <?= $this->Html->link(
                'JSON',
                array(
                    'controller'=>'Mangas',
                    'action'=>'json',
                    '?limit=100&name='
                ),
                array(
                    'class' => '',
                    'title' => 'json part'
                )

            ) ?>
        </li>
    </ul>
</nav>

</header>
