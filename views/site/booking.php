<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use app\assets\FontAsset;



FontAsset::register($this);

/* @var $this yii\web\View */
/* @var $model app\models\Enquiry */
/* @var $form ActiveForm */
?>

<?php
    if(yii::$app->session->hasFlash('success')){
        echo '<div class="alert alert-success">'.yii::$app->session->getFlash('success').'</div>';
    }
?>

<section id="contact">
    <div class="container">
        <div class="row">
        <div class="col-lg-12 text-center">
            <h2 class="section-heading">Book Now</h2>
            <h3 class="section-subheading text-muted">And we will reserve a place for you</h3>
            </div>
        </div>
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
            <?= $form->field($model, 'username') ?>
                </div>
                <div class="form-group"><?= $form->field($model, 'email') ?></div>
                <div class="form-group"> <?= $form->field($model, 'country') ?></div>
                <div class="form-group"><?= $form->field($model, 'arrival_date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Enter arrival date ...'],
                'pluginOptions' => [
                    'autoclose'=>true
                ]
                    ]);?></div>
                <div class="form-group"> <?= $form->field($model, 'departure_date')->widget(DatePicker::classname(), [
                'options' => ['placeholder' => 'Enter departure date ...'],
                'pluginOptions' => [
                    'autoclose'=>true
                ]
                    ]); ?></div>

            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</div> <!-- booking -->
</section>
