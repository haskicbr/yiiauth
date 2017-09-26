<?php
	/* @var $this SiteController */
	/* @var $model User */
	/* @var $form CActiveForm */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="language" content="ru"/>
	<title>Yii1 auth</title>
</head>

<body>
<h1>Yii APP AUTH</h1>
<div class="form">
	<?php var_dump(Yii::app()->user->id);
		foreach (Yii::app()->user->getFlashes() as $key => $message) {
			echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
		}
		$form = $this->beginWidget('CActiveForm', array(
			'id'                   => 'user-form',
			// Please note: When you enable ajax validation, make sure the corresponding
			// controller action is handling ajax validation correctly.
			// See class documentation of CActiveForm for details on this,
			// you need to use the performAjaxValidation()-method described there.
			'enableAjaxValidation' => false,
		)); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model, 'email'); ?><?php echo $form->textField($model, 'email'); ?><?php echo $form->error($model, 'email'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Отправка письма'); ?>
	</div>
	<?php $this->endWidget(); ?>
</div><!-- form -->
</body>
</html>