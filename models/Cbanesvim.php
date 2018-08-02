<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cbanesvim".
 *
 * @property int $id
 * @property string $banesvim BANESVIM
 */
class Cbanesvim extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cbanesvim';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['banesvim'], 'required'],
            [['banesvim'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'banesvim' => 'Banesvim',
        ];
    }
}
