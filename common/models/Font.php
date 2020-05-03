<?php

namespace common\models;

 use yii\db\ActiveRecord;

 class Font extends ActiveRecord
 {
     const LIMIT = 20;

     public static function tableName()
     {
         return '{{font}}';
     }

     public static function getPopular($pivot = null, $cyrrilic = null)
     {
         $state = self::find()->orderBy(['views' => SORT_DESC]);
         if($pivot) $state->where(['<', 'id', $pivot]);
         if ($cyrrilic) {
             $state->where(['cyrrilic' => $cyrrilic]);
         }

         $rows = $state->asArray()->all();
         $rows = array_map(static function(array $item) {
             $item['faces'] = json_decode($item['faces'], true);
             return $item;
         }, $rows);

         return $rows;
     }

     public static function getByName($font)
     {
         $row = self::findOne(['title' => $font])->toArray();
         $row['faces'] = json_decode($row['faces'], true);

         return $row;
     }
 }