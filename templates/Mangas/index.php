<h1> Liste de mes Mangas</h1>
<div class="marg_up">
    <?= $this->Html->link(
        'add Mangas',
        ['controller' => 'Mangas', 'action' => 'add'],
        [
            'class' => 'nice_button marg_up_button',
            'title' => 'other'
        ]
    ) ?>
</div>

<div class="super-align-center">

    <?php

    echo "
            {$this->Form->create(null)}

            {$this->Form->input('text',  ['label' => 'types : '])}
            {$this->Form->select('field', $types, ['label' => 'types : '])}
            {$this->Form->select('field', $authors, ['label' => 'Name : '])}

            {$this->Form->button('Submit')}

            {$this->Form->end()}
            ";


    ?>

</div>


<ul
    style='
        margin-top:50px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    '
>


    <?php
    foreach($mangas as $lineObject){
        $slugNameLine = $lineObject['slug_name']??'nop';
        $nameLine = $lineObject['name']??'manga inconue';
        $descriptionLine = $lineObject['description']??'pas de description';


        echo $this->Html->link(
            "<li class='card'>
                    <article>
                        <h2>
                            $nameLine
                        </h2>

                        {$this->Html->image(

                            'mangas_img/'.$slugNameLine.'.jpg',

                            array(

                                'style'=>'',

                                'class'=> 'img-home',
                            )
                        )}

                        <h3>
                            Description :
                        </h3>
                        <p>
                            $descriptionLine
                        </p>

                    </article>
                </li>",
            array(
                'controller'=>'Mangas',
                'action'=>'show',
                '/'.$slugNameLine
            ),
            array(
                'escape'=> false
            )
        );
    }


    ?>
</ul>
