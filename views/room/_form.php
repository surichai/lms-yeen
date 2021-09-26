<?php
$itemsStatus = [
    1 => 'เปิดใช้งาน',
    0 => 'ปิดใช้งาน',
];

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\Room */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="room-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>


   <?=
     $form->field($model, 'status')->widget(Select2::classname(), [
        'data' => $itemsStatus,
        'options' => ['placeholder' => 'เลือกสถานะ'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
?>
    <div class="form-group">
        <?= Html::submitButton('บันทึกข้อมูล', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>