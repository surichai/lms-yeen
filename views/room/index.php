<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RoomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ห้องสอบ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('สร้างห้อง', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            'name',
            [ // รวมคอลัมน์
                'attribute' => 'status',
                // 'format' => 'html',
                'value' => function ($model, $key, $index, $column) {
                    return $model->status ===1?'เปืดใช้งาน':'ปิดใช้งาน';
                }
            ],
            'link',
            'created_at:date:วันที่สร้าง',
            //'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'contentOptions' => [
                    'noWrap' => true
                ],
                'template' => ' {view} {update} {delete}',
                'buttons' => [
                    'copy' => function ($url, $model, $key) {
                        return Html::a('<i class="glyphicon glyphicon-off">test</i>', $url);
                    }
                ]
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
