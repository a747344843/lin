<?php

namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\db\Query;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\data\Pagination;

/**
 * UsersController implements the CRUD actions for users model.
 */
class User2Controller extends Controller
{
    //首页
    public function actionAdd(){
        $request = Yii::$app->request;
        if($request->isPost){
            $data = $request->post();
            //print_r($data);
            unset($data['_csrf']);
            //print_r($data);die;
            $res = Yii::$app->db->createCommand()->insert('user2',$data)->execute();
            if($res){
                $this->redirect("?r=user2/show");
            }
        }else{
            return $this->render('add');
        }
    }

    public function actionShow()
    {
        $query=new Query();
        $re=$query->from('user2')->all();
        $count=count($re);
        $pages = new Pagination(['totalCount' =>$count]);
        $pages->setPageSize(5);
        $models=$query
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
    	return $this->render('show',[
            'models'=>$models,
            'pages'=>$pages,
        ]);
    }
}
