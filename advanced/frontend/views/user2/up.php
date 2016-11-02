<?php
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\helpers\Html;
$this->registerJsFile("jquery.js",['position' => \yii\web\View::POS_HEAD]);
$form = ActiveForm::begin();
?>
<table class="table">
    <tr>
        <td>标题：</td>
        <td><input type="text" name="name" value="<?=$data['name']?>"/></td>
    </tr>
    <tr>
        <td>内容：</td>
        <td><input type="text" name="age" value="<?=$data['age']?>"/></td>
    </tr>
    <tr>
        <td></td>
        <td><?=Html::submitButton('提交',['class'=>'btn btn-success'])?></td>
    </tr>
</table>
<?php ActiveForm::end();?>