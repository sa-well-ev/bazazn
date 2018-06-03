<?php
/**
 *
 */

use yii\helpers\Html;

//use Yii;

//$this->title = $data->name;
//$this->params['breadcrumbs'][] = $this->title;

?>
<?php foreach ($docArrChange as $docItem): ?>
    <div class="panel panel-default">
        <div class="panel-body">
            <?php foreach ($docItem as $docField): ?>
                <?= $docField ?>
            <?php endforeach; ?>
        </div>
    </div>
<?php endforeach; ?>

