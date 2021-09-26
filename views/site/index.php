<?php

/* @var $this yii\web\View */

use app\models\User;

$this->title = 'หน้าหลัก';
$user = null;
$link = '';

if (!Yii::$app->user->isGuest && Yii::$app->user->id) {
    $user = User::findOne(Yii::$app->user->id);
    
}
?>
<?php if ($user) : ?>

    <div class="site-index">
        <div class="row">
            <div class="col-md-4">
                <table class="table ">
                    <tbody>
                        <tr>
                            <th>ชื่อผู้เข้าสอบ</th>
                            <td> <?= $user->full_name ?></td>

                        </tr>
                        <tr>
                            <th>ชื่อห้องเข้าสอบ</th>
                            <td></td>

                        </tr>
                        <tr>
                            <th>รหัสประจำตัว</th>
                            <td> <?= $user->id_card_number; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-8">

               <ifram  src="<?php echo $link;  ?>"></ifram>
                <h2>Form ข้อสอบ</h2>
            </div>
        </div>

        <button type="button" class="btn btn-outline-primary" id="getStatus"> test get Status</button>

        <button type="button" class="btn btn-outline-success" id="myButton"> test code lock </button>
    </div>

    <?php

    $this->registerJs(
        <<<JS
    jQuery('#myButton').on('click', function() { 
        
      jQuery.ajax({
            url: '/map-room/exam-behavior',
            type: 'post',
            data: {userId: $user->id , _csrf: yii.getCsrfToken()},        
            dataType: 'json',
        }).then(function(response) {
            console.log(response);
        });   
    });

    jQuery('#getStatus').on('click', function() { 
      jQuery.ajax({
            url: '/map-room/exam-status',
            type: 'post',
            data: {userId: $user->id , _csrf: yii.getCsrfToken()},        
            dataType: 'json',
        }).then(function(response) {
            console.log(response);
        });   
    });
JS
    );
    ?>
<?php endif; ?>