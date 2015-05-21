<?php

use yii\helpers\Html;
use matacms\widgets\ActiveForm;

?>
<div class="product">

    <?php $form = ActiveForm::begin([
        "id" => "form-product"
        ]);    
    ?>

        <?= $form->field($model, 'Name') ?>

        <?= $form->field($model, 'Text')->wysiwyg([]) ?>
        
        <?= $form->field($model, 'SnippetImage')->media() ?>

        <?= $form->field($model, 'Category')->category() ?>

        <?= $form->field($model, 'PublicationDate') ?>

    	<?= $form->field($model, 'URI')->slug('Title') ?>

        <?= $form->submitButton($model) ?>

    <?php ActiveForm::end(); ?>

</div>




