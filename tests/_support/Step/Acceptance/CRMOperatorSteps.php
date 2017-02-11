<?php
namespace Step\Acceptance;


class CRMOperatorSteps extends \AcceptanceTester
{
    public function amInAddCustomerUi()
    {
        
        $this->amOnPage('/customer/add');
    }

    public function imagineCustomer()
    {
        $faker = \Faker\Factory::create();

        return [
            'CustomerRecord[name]'      => $faker->name,
            'CustomerRecord[birthDate]' => $faker->date('Y-m-d'),
            'CustomerRecord[notes]'     => $faker->sentence(0),
            'PhoneRecord[number]'       => $faker->phoneNumber,
        ];
    }

    public function fillCustomerDataForm($fieldsData)
    {
        
        foreach ($fieldsData as $k => $v) {
            $this->fillField($k, $v);
        }
    }

    public function submitCustomerDataForm()
    {
        
        $this->click('Submit');
    }

    public function seeIAmInListCustomersUi()
    {
        
        $this->seeCurrentUrlMatches('/customers/');
    }

    public function amInListCustomersUi()
    {
        
        $this->amOnPage('/customers');
    }

    public function amInQueryCustomerUi()
    {
        
        $this->amOnPage('/customers/query');
    }


    public function fillInPhoneFieldWithDataFrom($customerData)
    {
        
        $this->fillField(
            'PhoneRecord[number]',
            $customerData['PhoneRecord[number]']
        );
    }

    public function clickSearchButton()
    {
        $this->click('Search');
    }

    public function seeCustomerInList($customerData)
    {
        $this->see($customerData['CustomerRecord[name]'], '#searchResults');
    }

    public function dontSeeCustomerInList($customerData)
    {
        $this->see($customerData['CustomerRecord[name]'], '#searchResults');
    }

}