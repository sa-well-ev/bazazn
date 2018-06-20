<?php
// TODO: вид ветки testData - удалить
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\test\TestDate */
/* @var $form ActiveForm */
?>
<div class="main-testdate">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'tmestamp_col') ?>
        <?= $form->field($model, 'date_col') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- main-testdate -->
