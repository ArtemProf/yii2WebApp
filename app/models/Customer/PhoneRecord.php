<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 11/02/2017
 * Time: 15:19
 */

namespace app\models\Customer;

use yii\db\ActiveRecord;

/**
 * Class PhoneRecord
 * @package app\models\Customer
 * @property integer customerId
 * @property string number
 */
class PhoneRecord extends ActiveRecord
{
    public static function tableName()
    {
        return 'phone';
    }

    public function rules()
    {
        return [
            ['customerId', 'number'],
            ['number', 'string'],
            [['customerId', 'number'], 'required']
        ];
    }
}