<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
use frontend\models\Category;
?>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    <h3>Обложка</h3>
    <?= $form->field($img, 'file')->fileInput()->label(false) ?>
    <h3>Ресурсы</h3>
    <?= $form->field($img, 'files[]')->fileInput(['multiple' => true, 'accept' => 'image/*'])->label(false) ?>
    <?php

        echo $form->field($img, 'id_category')->dropdownList(
            Category::find()->select(['title', 'id'])->indexBy('id')->column(),
            ['prompt'=>'Выбирите категорию']
        )->label(false);

    ?>

    <?= $form->field($img, 'title')->textInput(['placeholder' => 'Название'])->label(false) ?>

    <?= $form->field($html, 'content')->textInput(['placeholder' => 'HTML'])->label(false) ?>
    
    <?= $form->field($img, 'is_node_in_list')->checkbox()->label(false); ?>
    
    <?= $form->field($htmlList, 'id_root')->textInput(['placeholder' => 'Идентификатор главного узла'])->label(false) ?>

    <?= $form->field($htmlList, 'node_order')->textInput(['placeholder' => 'Порядок в котором она должна идти'])->label(false) ?>


    <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
    <?php if( Yii::$app->session->hasFlash('success') ): ?>
 <div class="alert alert-success alert-dismissible" role="alert">
 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
 <?php echo Yii::$app->session->getFlash('success'); ?>
 </div>
<?php endif;?>
<?php ActiveForm::end() ?>