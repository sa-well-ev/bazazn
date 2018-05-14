<?php
/**
 *
 */
use yii\helpers\Html;

$this->title = 'Главная страница';
//$this->params['breadcrumbs'][] = $this->title;

//showVar($data->letterCat);
showVar($data->name);
foreach ($data->letterCat as $letter){
    showVar($letter->letter['doc_number']);
}

?>

<h3>Проверка</h3>
