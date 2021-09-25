<?php

/* @var $this yii\web\View */

$this->title = 'Hello';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Hello!</h1>
    </div>
    <?php
    $fourRandomDigit = rand(1000, 9999);
    echo $fourRandomDigit;
    ?>

</div>