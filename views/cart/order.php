<?php
use yii\widgets\ActiveForm;

?>
<h2>Оформление заказа</h2>

<?php $form = ActiveForm::begin() ?>
<?php echo $form->field($order, 'name')?>
<?php echo $form->field($order, 'email')?>
<?php echo $form->field($order, 'phone')?>
<?php echo $form->field($order, 'address')?>
<button class="btn btn-success">Оформить заказ</button>
<?php $form = ActiveForm::end() ?>