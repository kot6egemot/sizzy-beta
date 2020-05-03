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

         $fonts = [];
         foreach($dirs as $fontName)
         {
             if (!is_dir(self::DIR . '/' . $fontName)) {
                 continue;
             }
             $files = scandir(self::DIR . '/' . $fontName);
             foreach($files as $file)
             {
                 if (strpos($file, '.ttf') === false) {
                     continue;
                 }
                 if (preg_match('/-(?P<face>[a-z]+)\.ttf$/i', $file, $matches)) {
                     if (!array_key_exists($fontName, $fonts)) {
                         $fonts[$fontName] = ['faces' => []];
                     }
                     $fonts[$fontName]['faces'][] = [
                         'title' => $matches['face'],
                         'fileName' => $file
                     ];
                 }
             }
         }
         foreach ($fonts as $fontName => $attr) {
             $regular = null;
             foreach ($attr['faces'] as $face) {
                 if ($face['title'] === 'Regular') {
                     $regular = $face['fileName'];
                     break;
                 }
             }
             if ($regular === null) {
                 continue;
             }
             $model = Font::find()->where(['title' => ucfirst($fontName)])->one();
             if ($model === null) {
                 $model = new Font();
             }
             $model->title = ucfirst($fontName);
             $model->src = 'uploads/fonts/' . $fontName . '/' . $regular;
             $model->cyrrilic = in_array($fontName, $this->getCyrrilicFonts()) ? 1 : 0;
             $model->faces = json_encode($attr['faces']);
             $model->save();
         }

         echo sprintf('Total: %s', count($dirs)) . PHP_EOL;
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