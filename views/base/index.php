<?php
/**
 *
 */
use yii\helpers\Html;
use app\widgets\MenuWidget;

$this->title = 'Главная страница';
//$this->params['breadcrumbs'][] = $this->title;

?>
<div class="container">
    <div class="col-sm-3">
        <?= MenuWidget::widget(['tpl' => 'menu'])?>
    </div>
</div>
