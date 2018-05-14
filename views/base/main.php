<?php
/**
 *
 */
use yii\helpers\Html;

$this->title = 'Главная страница';
//$this->params['breadcrumbs'][] = $this->title;

?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="container">
    <div class="col-sm-3">
        <?= $data->name?>
    </div>
    <div class="col-sm-9">
        <?php foreach ($data->letterCat as $letter):?>
            <?= $letter->letter['doc_number']?><br>
        <?php endforeach;?>
    </div>
</div>
