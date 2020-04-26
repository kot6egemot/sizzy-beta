<?php

namespace common\models;

use yii\db\ActiveRecord;

class Font extends ActiveRecord
{
    const LIMIT = 10;

    public static function tableName()
    {
        return '{{font}}';
    }

    public static function getPopular($pivot = null)
    {
        $state = self::find()->orderBy(['views' => SORT_DESC])->limit(self::LIMIT);
        if($pivot) $state->where(['<', 'id', $pivot]);

        return $state->asArray()->all();
    }
}