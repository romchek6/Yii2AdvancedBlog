<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\SettingsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="settings-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title_first') ?>

    <?= $form->field($model, 'title_second') ?>

    <?= $form->field($model, 'phone') ?>

    <?= $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'about') ?>

    <?php // echo $form->field($model, 'keywords') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
