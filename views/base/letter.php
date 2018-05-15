<?php
/**
 *
 */
use yii\helpers\Html;
use app\widgets\MenuWidget;
use Yii;

$this->title = $data->name;
$this->params['breadcrumbs'][] = $this->title;

?>
    <div class="col-sm-3">
        <?= MenuWidget::widget(['tpl' => 'menu', 'model' => 'letter'])?>
    </div>
    <div class="col-sm-9">
        <?php foreach ($data->letterCat as $letter):?>00
            <?= $letter->letter['doc_number']?><br>
        <?php endforeach;?>
    </div>

