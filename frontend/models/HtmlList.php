<?php

namespace frontend\models;

use yii\db\ActiveRecord;

class HtmlList extends ActiveRecord
{
    public static function tableName()
    {
        return 'html_list';
    }

    public function rules()
    {
        return [
            ['id_root', 'safe'],
            ['node_order', 'safe']
        ];
    }

    /**
     * Получение всех id html list'а у узла
     */
    public static function getIds($id_root)
    {
        return self::find()->where(['id_root' => $id_root])->
                             orderBy(['node_order' => SORT_ASC])->
                             asArray()->
                             all();
    }
}