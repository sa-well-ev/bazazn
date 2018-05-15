<?php
/**
 *
 */
use yii\helpers\Html;
//use Yii;

$this->title = $data->name;
$this->params['breadcrumbs'][] = $this->title;

?>
<?php foreach ($docArrChange as $docItem):?>
    <?php foreach ($docItem as $docField):?>
        <?= $docField?>
    <?php endforeach;?>
    <br>
<?php endforeach;?>

