<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class Admin extends ActiveRecord
{

    public static function tableName()
    {
        return 'user';
    }


}
