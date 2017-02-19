<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 11/02/2017
 * Time: 15:13
 */

namespace app\models\Customer;

use yii\db\ActiveRecord;

/**
 * Class CustomerRecord
 * @package app\models\Customer
 * @property integer id
 * @property string name
 * @property date birthDate
 * @property string notes
 */
class CustomerRecord extends ActiveRecord
{
    public static function tableName()
    {
        return 'customer';
    }

    public function rules()
    {
        return [
            ['name', 'required'],
            ['id', 'number'],
            ['name', 'string', 'max' => 256],
            ['birthDate', 'date', 'format' => 'Y-m-d'],
            ['notes', 'safe']
        ];
    }
}