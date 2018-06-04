<?php
/**
 *
 */

use yii\helpers\Html;

//use Yii;

//$this->title = $data->name;
//$this->params['breadcrumbs'][] = $this->title;
$i = 0;
?>
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
<?php foreach ($docArrChange as $docItem): ?>
    <?php $i++ ?>
    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="headingOne">
            <h4 class="panel-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $i ?>" aria-expanded="false" aria-controls="collapse<?= $i ?>">
                    Collapsible Group Item <?= $i ?>
                </a>
            </h4>
        </div>
        <div id="collapse<?= $i ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?= $i ?>">
            <div class="panel-body">
                <?php foreach ($docItem as $docField): ?>
                    <?= $docField ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    </div>
<?php endforeach; ?>
</div>

