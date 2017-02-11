<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 11/02/2017
 * Time: 15:27
 */

namespace app\controllers;


use app\models\Customer\Customer;
use app\models\Customer\CustomerRecord;
use app\models\Customer\Phone;
use app\models\Customer\PhoneRecord;
use yii\base\Controller;

class CustomerController extends Controller
{

    public function actionAdd()
    {
        $customer = new CustomerRecord();
        $phone = new PhoneRecord();

        return $this->render('add', compact('customer', 'phone'));
    }

    private function store(Customer $customer)
    {
        $customRec = new CustomerRecord();
        $customRec->name = $customer->name;
        $customRec->birthDate = $customer->birthDate;
        $customRec->notes = $customer->notes;
        $customRec->save();

        foreach ($customer->phones as $p) {
            $phoneRec = new Phone();
            $phoneRec->number = $p->number;
            $phoneRec->customerId = $customRec->id;
            $phoneRec->save();
        }
    }

    private function makeCustomer(
        CustomerRecord $customRec,
        PhoneRecord $phoneRec
    )
    {
        $name = $customRec->name;
        $bd = new \DateTime($customRec->birthDate);

        $customer = new Customer($name, $bd);
        $customer->notes = $customer->notes;
        $customer->phones[] = new Phone($phoneRec->number);

        return $customer;
    }
}