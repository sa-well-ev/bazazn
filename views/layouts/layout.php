<?php
/**
 *
 */
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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

        </div>
        <div class="col-sm-9">
            <a href="<?= \yii\helpers\Url::to(['base/letter', 'id' => $queryParam]) ?>">Письма</a>
            <a href="<?= \yii\helpers\Url::to(['base/npa', 'id' => $queryParam]) ?>">НПА</a>
            <a href="<?= \yii\helpers\Url::to(['base/fas', 'id' => $queryParam]) ?>">Решения ФАС</a>
            <a href="<?= \yii\helpers\Url::to(['base/judgement', 'id' => $queryParam]) ?>">Судебные решения</a>
        </div>
    </div>
    <?= $content ?>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>