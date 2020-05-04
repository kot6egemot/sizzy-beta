<?php

namespace frontend\controllers;

use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * @TODO переделать данную страницу под нормальный формат слоев после получения других страниц
     * Displays aboutPage
     */
    public function actionAbout()
    {
        $this->layout = false;
        return $this->render('about');
    }
}