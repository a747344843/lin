<?
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
$this->registerJsFile("jquery.js",['position' => \yii\web\View::POS_HEAD]);
$form = ActiveForm::begin();
?>
    <table>
        <tr>
            <td>姓名：</td>
            <td><input type="text" name="name" value="<?php echo $list['name'] ?>"/></td>
        </tr>
        <tr>
            <td>年龄：</td>
            <td><input type="text"name="age" value="<?php echo $list['age'] ?>" /></td>
        </tr>
        <tr>
            <td></td>
            <td><?=Html::submitButton('修改',['class'=>'btn btn-success'])?></td>
        </tr>
    </table>
<?php ActiveForm::end();?>