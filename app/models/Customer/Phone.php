<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 11/02/2017
 * Time: 13:46
 */

namespace app\models\Customer;

/**
 * Class Phone
 * @package app\models\Customer
 * @property integer number
 */
class Phone
{
    /**
     * @var string
     */
    public $number;

    /**
     * Phone constructor.
     * @param $number
     */
    public function __construct($number)
    {
        $this->number = $number;
    }
}