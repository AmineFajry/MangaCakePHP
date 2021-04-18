<div class="marg_up">
    <?= $this->Html->link(
        'add Friends',
        ['controller' => 'Friends', 'action' => 'add'],
        [
            'class' => 'nice_button',
            'title' => 'other'
        ]
    ) ?>
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
    foreach($friends as $lineObject){
        $slugNameLine = $lineObject['slug_full_name']??'anonymous';
        $nameLine = $lineObject['full_name']??'anonymous';
        $descriptionLine = $lineObject['description']??'pas de description';




        echo $this->Html->link(
            "<li class='card'>
                    <article>
                        <h2>
                            $nameLine
                        </h2>

                        {$this->Html->image(

                            'friends_img/'.$slugNameLine.'.jpg',

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
                'controller'=>'Friends',
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
