<?php

namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use frontend\models\Img;
use frontend\models\Html;
use yii\web\UploadedFile;
use frontend\models\Category;
use frontend\models\HtmlList;

class AdminController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionIndex()
    {
        return $this->render('index', [
            'imgs' => Img::get()
        ]);
    }

    public function actionDetail($id)
    {
        $img = Img::getById($id);
        $html = Html::getById($img->id_html);

        if($img->load(Yii::$app->request->post()))
        {
            $img->file = UploadedFile::getInstance($img, 'file');
            if ($path = $img->upload()) {
                $img->src = $path;
            }
            if($img->save()) {
                var_dump('Обложка изменена');
            }
        }

        return $this->render('detail', [
            'img' => $img,
            'html' => $html
        ]);
    }

    public function actionCreate()
    {
        $img = new Img();
        $html = new Html();
        $htmlList = new HtmlList();

        if (Yii::$app->request->isPost && $html->load(Yii::$app->request->post())) {
            
            if(!$html->save()) return;

            $id_html = Html::getLast()->id;

            $img->file = UploadedFile::getInstance($img, 'file');
            $img->files = UploadedFile::getInstances($img, 'files');
            $img->uploadResources();
            
            if ($path = $img->upload()) {
                $img->src = $path;
                $img->id_html = $id_html;
                $img->show_order = (int)Img::find()->max('show_order') + 1;

                $img->load(Yii::$app->request->post());
                if($img->save())
                {
                    if((int)Yii::$app->request->post('Img')['is_node_in_list'])
                    {
                        $htmlList->load(Yii::$app->request->post());
                        $htmlList->node = $img->id;
                        $htmlList->save();
                    }

                    var_dump('Шаблон загружен');
                    return;
                }
            }
        }

        return $this->render('create', [
            'img' => $img,
            'html' => $html,
            'htmlList' => $htmlList
        ]);
    }

    public function actionCategory()
    {
        return $this->render('category', [
            'categories' => Category::get()
        ]);
    }

    public function actionCategoryCreate() 
    {
        if(Yii::$app->request->isPost)
        {
            $category = new Category();
            $category->title = Yii::$app->request->post('title');
            $category->save();
            var_dump('Категория сохранена');
            return;
        }

        return $this->render('category-create');
    }

    public function actionCategoryUpdate($id)
    {
        $category = Category::findById($id);

        if(Yii::$app->request->isPost)
        {
            $category->title = Yii::$app->request->post('title');
            $category->save();
            var_dump('Данные изменены');
            return;
        }

        return $this->render('update', [
            'category' => $category
        ]);
    }

    public function actionCategoryDelete()
    {
        if(Yii::$app->request->isAjax)
        {
            $category = Category::findById((int)Yii::$app->request->post('id'));
            $category->delete();
        } 
    }

    public function actionUpdate()
    {
        if(Yii::$app->request->isAjax)
        {
            $html = Html::getById((int)Yii::$app->request->post('id'));

            $html->content = htmlspecialchars_decode(Yii::$app->request->post('content'));
            echo $html->save() ? json_encode(['status' => 'success']) : json_encode(['status' => 'error']);
            return;
        }
    }

    public function actionDelete()
    {
        if(Yii::$app->request->isAjax)
        {
            $img = Img::getById((int)Yii::$app->request->post('id'));
            $html = Html::getById($img->id_html);

            $img->delete();
            $html->delete();
        } 
    }

    public function actionSwap()
    {
        if(Yii::$app->request->isAjax)
        {
            Img::swap(
                Yii::$app->request->get('show_one'),
                Yii::$app->request->get('show_two')
            );
        }
    }
}