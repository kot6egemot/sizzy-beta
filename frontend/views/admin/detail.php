<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$content = htmlspecialchars($html->content);
?>



<h3 class="logo">Обложка</h3>
<div>
    <img class="logo" src="/<?= $img->src ?>" width="500">
</div>

<h3>Обложка</h3>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
    <?= $form->field($img, 'file')->fileInput()->label(false) ?>
    <?= Html::submitButton('Загрузить', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end() ?>

<h3 class="logo">HTML</h3>

<div class="html-id"><?= $html->id ?></div>

<div id="editor" class="html-content">
<?= $content ?>
</div>


<div class="alert alert-success alert-update" role="alert" style="display: none;">
    Изменено
</div>

<button class="btn btn-success update-html">Изменить</button>

<style>
    .logo {
        margin-left: 10px;
    }

    .html-content {
        border: 1px solid #000;
        margin: 10px;
    }

    #editor { 
        position: absolute;
        top: 700px;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 300px;
    }
</style>