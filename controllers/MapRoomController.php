<?php

namespace app\controllers;

use app\models\MapRoom;
use app\models\MapRoomSearch;
use app\models\User;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\UploadedFile;

/**
 * MapRoomController implements the CRUD actions for MapRoom model.
 */
class MapRoomController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all MapRoom models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MapRoomSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MapRoom model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new MapRoom model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MapRoom();

        var_dump(
            $this->request->post());
            exit();
        // if ($this->request->isPost) {
        //     if ($model->load($this->request->post()) && $model->save()) {
        //         return $this->redirect(['view', 'id' => $model->id]);
        //     }
        // } else {
        //     $model->loadDefaultValues();
        // }

        // return $this->render('create', [
        //     'model' => $model,
        // ]);
    }
    

    public function actionExamBehavior(){

        $message =[

        ];
       $randomCode = rand(1000, 9999);
        // User::findOne(condition)
        // exit();
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

       if($this->request->post()){
           $post = $this->request->post();
           $user= User::findOne($post['userId']);
           $map_room = MapRoom::findOne(['user_id'=> $user->id]);

           if(!$map_room->code_lock){
                $map_room->code_lock = $randomCode;
                $map_room->save();
                $message = [
                    'status' => 'create lock success',
                    'lock' => true
                ];
            }else{
                $message = [
                    'status' => 'not',
                    'lock' => true
                ];
            }
            // Json::decode($this->request->post(),true);
       }
        return $message;
    }


    public function actionExamStatus()
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $message = [];
        if ($this->request->post()) {
            $post = $this->request->post();
            $userId = $post['userId'];
            $map_room = MapRoom::findOne(['user_id' => $userId]);
            if($map_room->status != 1){
                $message = [
                    'end_exam'=>false
                ];
            }else{
                $message = [
                    'end_exam' => true
                ];
            }
        }
        return   $message;
    }
    /**
     * Updates an existing MapRoom model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MapRoom model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MapRoom model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return MapRoom the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MapRoom::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public $uploadPath = 'uploads/file';
   

    public function uploadFile($model, $attribute)
    {
        $file = UploadedFile::getInstance($model, $attribute);

        if ($file) {
            if ($this->isNewRecord) {
                $fileName = time() . '_' . $file->baseName . '.' . $file->extension;
            } else {
                $fileName = $this->getOldAttribute($attribute);
            }
            $file->saveAs(Yii::getAlias('@webroot') . '/' . $this->uploadPath . '/' . $fileName);

            return $fileName;
        }
        return $this->isNewRecord ? false : $this->getOldAttribute($attribute);
    }

}
