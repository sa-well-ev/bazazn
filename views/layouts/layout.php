<?php
/**
 *
 */
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\widgets\MenuWidget;

AppAsset::register($this);
$queryParam = Yii::$app->request->getQueryParam('id')
?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="ru-RU">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="container">
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-sm-3">
            <label>
                <input name="withChild" type="checkbox" checked> С вложенными
            </label>
        </div>
        <div class="col-sm-9">
            <a href="#" data-model="letter" class="href-ajax">Письма</a>
            <a href="#" data-model="npa" class="href-ajax">НПА</a>
            <a id="" href="#" data-model="fas" class="href-ajax">Решения ФАС</a>
            <a href="#" data-model="judgement" class="href-ajax">Судебные решения</a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <!--Начало меню-->
            <?= MenuWidget::widget(['tpl' => 'menu'])?>
            <!--Конец меню-->
        </div>
        <div id="doc-list" class="col-sm-9">
            <?= $content ?>
        </div>
    </div>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>