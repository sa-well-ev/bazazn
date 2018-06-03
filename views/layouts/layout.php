<?php
/**
 *
 */

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use app\assets\AccordionAsset;
use app\widgets\MenuWidget;
use yii\bootstrap\Nav;

AccordionAsset::register($this);
$queryParam = Yii::$app->request->getQueryParam('id');
/*Чтобы не захламлять Nav виджет одними и теми же строками пакуем все параметры в массив*/
$navParams = [];
    $navItem = [
        'letter' => 'Письма',
        'npa' => 'НПА',
        'fas' => 'Решения ФАС',
        'judgement' => 'Судебные решения'
        ];
    foreach ($navItem as $name => $value){
        $navOneItem['label'] = $value;
        $navOneItem['url'] = '#' . $name;
        $navOneItem['linkOptions'] = [
            'class' => 'nav-link href-ajax',
            'data-toggle' => "tab",
            'id' => $name . '-tab',
            'data-model' => $name,
        ];
        $navOneItem['options'] = ['class' => 'nav-item'];
        if ($name == 'letter') $navOneItem['active'] = true;
        $navParams[] = $navOneItem;
        $navOneItem = [];
    };
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
        <h1 class="text-center bg-info"><?= Html::encode($this->title)?></h1>
        <div class="row">
            <div class="col-sm-3 text-center">
                <div class="checkbox">
                    <label>
                        <input name="withChild" type="checkbox" checked> С вложенными
                    </label>
                </div>
            </div>
            <div class="col-sm-9">
                <?= Nav::widget([
                    'items' => $navParams,
                    'options' => ['class' => 'nav nav-tabs nav-justified', 'role' => "tablist"],
                ]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <!--Начало меню-->
                <?= MenuWidget::widget(['tpl' => 'menu']) ?>
                <!--Конец меню-->
            </div>
            <div class="col-sm-9">
               <div id="doc-list" class="well well-sm">
                   <?= $content ?>
               </div>
            </div>
        </div>
    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>