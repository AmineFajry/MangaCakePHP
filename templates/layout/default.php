<!DOCTYPE html>

<html lang="fr">

<head>

    <?= $this->Html->charset(); ?>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title> <?= $this->fetch('title') ?> </title>
    
    <meta name="description" content="<?= $this->fetch('description') ?>">
    
    <?= $this->Html->css("style") ?>

</head>

<body>

    <selection id="container">

        <?= $this->element('front/header') ?>


        <main  class="content-classique-marg">

            <?= $this->fetch('content')?>

        </main>


        <?= $this->element('front/footer') ?>

    </selection>


    <?= $this->Flash->render() ?>


    <?= $this->Html->script("source") ?>

    <?= $this->fetch('script') ?>

</body>

</html>