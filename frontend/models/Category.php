<?php

namespace frontend\models;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
        return '{{category}}';
    }

    /**
     * Получение всех категорий
     */
    public static function get()
    {
        return self::find()->asArray()->all();
    }

    public static function findById($id)
    {
        return self::find()->where(['id' => $id])->one();
    }
};