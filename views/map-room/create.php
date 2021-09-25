<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MapRoom */

$this->title = 'Create Map Room';
$this->params['breadcrumbs'][] = ['label' => 'Map Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="map-room-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
