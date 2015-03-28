<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\models\Company;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model backend\models\Branch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="branch-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'company_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Company::find()->all(), 'id', 'name'),
        'language' => 'en',
        'options' => ['placeholder' => 'Select a company ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 100]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'ACTIVE' => 'ACTIVE', 'INACTIVE' => 'INACTIVE', ], ['prompt' => 'Status']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
