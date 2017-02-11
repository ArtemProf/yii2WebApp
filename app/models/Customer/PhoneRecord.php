<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 11/02/2017
 * Time: 15:19
 */

namespace models\Customer;


class PhoneRecord
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