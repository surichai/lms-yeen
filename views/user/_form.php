<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */

$items=[
 '1'=>'สมาชิก',
  '2'=>'แอดมิน',
    '3' => 'Super แอดมิน',

]
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'phone')->textInput([
        'maxlength' => 10
    ]) ?>
    <?= $form->field($model, 'id_card_number')->textInput(
        [
            'maxlength' => 13
        ]
    ) ?>
    <?= $form->field($model, 'role')->dropDownList($items) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>