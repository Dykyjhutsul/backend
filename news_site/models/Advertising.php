<?php
/**
 * Created by PhpStorm.
 * User: Денис
 * Date: 06.11.2017
 * Time: 19:30
 */

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class Advertising extends ActiveRecord
{

    public static function tableName()
    {
        return 'advertising';
    }


}
