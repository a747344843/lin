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
    //展示
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
    //删除
    public function actionDel(){
        $id = Yii::$app->request->get("id");
        // var_dump($id);die;
        $res = Yii::$app->db->createCommand()->delete('user2',array("id"=>$id))->execute();
        if($res){
            $this->redirect("?r=user2/show");
        }else{
            $this->redirect("?r=user2/show");
        }
    }

    //修改
    public function actionUp(){
    	$request = Yii::$app->request;
    	$id = $request->get("id");
    	$query = new Query();
    	$data = $query->from('user2')->where("id='$id'")->one();
    	if($request->isPost){
    		$data=$request->post();
    		unset($data['_csrf']);
    		//print_r($data);die;
    		$res = Yii::$app->db->createCommand()->update('user2',$data,"id=$id")->execute();
    		if($res){
    			$this->redirect("?r=user2/show");
    		}
    	}else{
    		return $this->render('up',['data'=>$data]);
    	}
    }
}
