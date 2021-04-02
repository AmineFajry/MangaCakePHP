<header>
<nav><input id="check-responsiv-nav" type="checkbox" style="display: none;">
    <ul>
        <li><label  id="if-display-responsiv-nav" for="check-responsiv-nav">Menu</label></li>
        <li>
            <?= $this->Html->link(
            'Acceuil',
            ['controller' => 'Images', 'action' => 'index'],
            [
                'class' => '',
                'title' => 'HOME PAGE'
            ]
            );?>
        </li>
        <li>
            <?= $this->Html->link(
                'json',
                ['controller' => 'Images', 'action' => 'display'],
                [
                    'class' => '',
                    'title' => 'img'
                ]
            ) ?>
        </li>
        <li>
            <?= $this->Html->link(
                'add',
                ['controller' => 'Images', 'action' => 'add'],
                [
                    'class' => '',
                    'title' => 'other'
                ]
            ) ?>
        </li>
    </ul>
</nav>

</header>