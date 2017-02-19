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
use Yii;
use yii\data\ArrayDataProvider;
use yii\web\Controller;

class CustomersController extends Controller
{
    /**
     *
     */
    public function actionIndex()
    {
        $records = $this->findRecordsByQuery();

        return $this->render('index', compact('records'));
    }

    /**
     * @return mixed
     */
    private function findRecordsByQuery()
    {
        $number = Yii::$app->request->get('phoneNumber');

        $records = $this->getRecordsByPhoneNumber($number);
        $dataProvider = $this->wrapIntoDataProvider($records);

        return $dataProvider;
    }

    /**
     * @param $number
     * @return array
     */
    private function getRecordsByPhoneNumber($number)
    {
        $phoneRec = PhoneRecord::findOne(['number' => $number]);
        if (!$phoneRec) {
            return [];
        }
        $customerRec = CustomerRecord::findOne($phoneRec->customerId);

        if (!$customerRec) {
            return [];
        }
        return [$this->makeCustomer($customerRec, $phoneRec)];
    }

    /**
     * @param CustomerRecord $customRec
     * @param PhoneRecord $phoneRec
     * @return Customer
     */
    private function makeCustomer(
        CustomerRecord $customRec,
        PhoneRecord $phoneRec
    )
    {
        $name = $customRec->name;
        $bd = new \DateTime($customRec->birthDate);

        $customer = new Customer($name, $bd);
        $customer->notes = $customer->notes;
        $customer->phones = [];
        $customer->phones[] = new Phone($phoneRec->number);

        return $customer;
    }

    /**
     * @param $data
     * @return ArrayDataProvider
     */
    private function wrapIntoDataProvider($data)
    {
        return new ArrayDataProvider([
            'allModels'  => $data,
            'pagination' => false
        ]);
    }

    /**
     * @return string
     */
    public function actionQuery()
    {
        return $this->render('query');
    }

    /**
     * @return string
     */
    public function actionAdd()
    {
        $customer = new CustomerRecord();
        $phone = new PhoneRecord();

        $req = \Yii::$app->request;

        if ($req->isPost && $this->load($customer, $phone, $req->post())) {
            $this->store(
                $this->makeCustomer($customer, $phone)
            );

            return $this->redirect('/customers');
        }

        return $this->render('add', compact('customer', 'phone'));
    }

    /**
     * @param CustomerRecord $customer
     * @param PhoneRecord $phone
     * @param array $post
     * @return bool
     */
    private function load(
        CustomerRecord $customer,
        PhoneRecord $phone,
        array $post
    )
    {
        return $customer->load($post)
        and $phone->load($post)
        and $customer->validate()
        and $phone->validate(['number']);
    }

    /**
     * @param Customer $customer
     */
    private function store(Customer $customer)
    {
        $customRec = new CustomerRecord();
        $customRec->name = $customer->name;
        $customRec->birthDate = $customer->birthDate->format('Y-m-d');
        $customRec->notes = $customer->notes;
        $customRec->save();

        foreach ($customer->phones as $p) {
            $phoneRec = new PhoneRecord();
            $phoneRec->number = $p->number;
            $phoneRec->customerId = $customRec->id;
            $phoneRec->save();
        }
    }
}