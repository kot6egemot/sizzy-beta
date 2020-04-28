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

         foreach($dirs as $dir)
         {
             $files = scandir(self::DIR . '/' . $dir);
             foreach($files as $file)
             {
                 if(preg_match('~\w+\-Regular\.ttf~', $file))
                 {
                     $fontName = ucfirst($dir);
                     $model = Font::find()->where(['title' => $fontName])->one();
                     if ($model === null) {
                         $model = new Font();
                     }
                     $model->title = $fontName;
                     $model->src = 'uploads/fonts/' . $dir . '/' . $file;
                     $model->cyrrilic = in_array($dir, $this->getCyrrilicFonts()) ? 1 : 0;
                     $model->save();
                 }
             }
         }
     }

     private function getCyrrilicFonts()
     {
         return [
             'alegreya',
             'alegreyasc',
             'alegreyasans',
             'alegreyasanssc',
             'alice',
             'amaticsc',
             'andika',
             'anonymouspro',
             'arimo',
             'arsenal',
             'badscript',
             'bellota',
             'bellotatext',
             'caveat',
             'comfortaa',
             'cormorant',
             'cormorantgaramond',
             'cormorantinfant',
             'cormorantsc',
             'cousine',
             'cuprum',
             'didactgothic',
             'ebgaramond',
             'elmessiri',
             'exo2',
             'firamono',
             'firasans',
             'firasanscondensed',
             'firasansextracondensed',
             'forum',
             'gabriela',
             'ibmplexmono',
             'ibmplexsans',
             'ibmplexserif',
             'inter',
             'istokweb',
             'jura',
             'kellyslab',
             'kurale',
             'literata',
             'lobster',
             'lora',
             'mplus1p',
             'mplusrounded1c',
             'marckscript',
             'marmelad',
             'merriweather',
             'montserrat',
             'montserratalternates',
             'neucha',
             'notosans',
             'notoserif',
             'nunito',
             'oldstandardtt',
             'opensans',
             'opensanscondensed',
             'oranienbaum',
             'oswald',
             'ptmono',
             'ptsans',
             'ptsanscaption',
             'ptsansnarrow',
             'ptserif',
             'ptserifcaption',
             'pacifico',
             'roboto',
             'robotocondensed',
             'robotomono',
             'robotoslab',
             'rubik',
             'rubikmonoone',
             'ruda',
             'ruslandisplay',
             'russoone',
             'sawarabigothic',
             'scada',
             'seymourone',
             'sourcesanspro',
             'spectral',
             'spectralsc',
             'stalinistone',
             'tenorsans',
             'tinos',
             'ubuntu',
             'ubuntucondensed',
             'ubuntumono',
             'underdog',
             'viaodalibre',
             'vollkorn',
             'yanonekaffeesatz',
             'yesevaone'
         ];
     }
 }