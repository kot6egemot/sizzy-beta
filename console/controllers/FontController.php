<?php

 namespace console\controllers;

 use yii\console\Controller;
 use common\models\Font;

 class FontController extends Controller
 {
     const DIR = 'frontend/web/uploads/fonts';

     /**
      * Индексация директории uploads/fonst/*
      * Сохранение данных о шрифтах в базу данных
      */
     public function actionIndex()
     {
         $dirs = scandir(self::DIR);
         array_shift($dirs);
         array_shift($dirs);


         $counter = 0;
         foreach($dirs as $dir)
         {
             $files = scandir(self::DIR . '/' . $dir);
             foreach($files as $file)
             {
                 if(preg_match('~\w+\-Regular\.ttf~', $file))
                 {
                     $model = new Font();

                     $model->title = ucfirst($dir);
                     $model->src = 'uploads/fonts/' . $dir . '/' . $file;

                     $model->save();
                 }
             }
        /*     if($counter++ == 10) break;*/
         }
     }
 }