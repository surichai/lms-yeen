<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MapRoom */

$this->title = 'Create Map Room';
$this->params['breadcrumbs'][] = ['label' => 'Map Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="map-room-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <!-- <?= $this->render('_form', [
                'model' => $model,
            ]) ?> -->

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>
    <?= $form->field($model, 'file')->fileInput() ?>
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>

    <?php ActiveForm::end(); ?>

</div>