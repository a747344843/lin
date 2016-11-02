<?php
use yii\widgets\LinkPager;
?>
<center>
    <table class="table">
        <th>姓名</th>
        <th>年龄</th>
        <?php  foreach($models as $v) :?>
        <tr>
            <td><?php echo $v['name']?></td>
            <td><?php echo $v['age']?></td>
        </tr>
        <?php endforeach ?>
    </table>
    <?php
    echo LinkPager::widget([
        'pagination' => $pages,
        'firstPageLabel' => '首页',
        'lastPageLabel' => '末页',
        'prevPageLabel' => '上一页',
        'nextPageLabel' => '下一页',
    ]);
    ?>
</center>
