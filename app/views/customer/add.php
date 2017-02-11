<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
use yii\web\View;
use app\models\Customer\CustomerRecord;
use app\models\Customer\PhoneRecord;

/**
 * Add custom UI.
 *
 * @var View $this;
 * @var CustomerRecord $customer;
 * @var PhoneRecord $phone
 */
$form = ActiveForm::begin([
    'id' => 'form-input-example',
    'options' => [
        'class' => 'form-horizontal col-lg-11',
    ],
]);
?>

<?= $form->errorSummary([$customer, $phone]); ?>

<?= $form->field($customer, 'name'); ?>
<?= $form->field($customer, 'birthDate'); ?>
<?= $form->field($customer, 'notes'); ?>
<?= $form->field($phone, 'number'); ?>

<?= Html::submitButton('Submit', ['class' => 'btn btn-primary']); ?>
<? ActiveForm::end(); ?>
