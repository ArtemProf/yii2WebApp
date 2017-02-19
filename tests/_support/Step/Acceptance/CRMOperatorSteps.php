<?php
namespace Step\Acceptance;


class CRMOperatorSteps extends \AcceptanceTester
{
    public function amInAddCustomersUi()
    {

        $this->amOnPage('/customers/add');
    }

    public function imagineCustomers()
    {
        $faker = \Faker\Factory::create();

        return [
            'input[name*=name]'      => $faker->name,
            'input[name*=birthDate]' => $faker->date('Y-m-d'),
            'input[name*=notes]'     => $faker->sentence(0),
            'input[name*=number]'    => $faker->phoneNumber,
        ];
    }

    public function fillCustomersDataForm($fieldsData)
    {
        foreach ($fieldsData as $k => $v) {
            $this->fillField($k, $v);
        }
    }

    public function submitCustomersDataForm()
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

    public function amInQueryCustomersUi()
    {
        $this->amOnPage('/customers/query');
    }

    public function fillInPhoneFieldWithDataForm($customersData)
    {
        $this->fillField(
            'input[name*=phoneNumber]',
            $customersData['input[name*=number]']
        );
    }

    public function clickSearchButton()
    {
        $this->click('Search');
    }

    public function seeCustomersInList($customersData)
    {
        $this->see($customersData['input[name*=name]'], '#search_results');
    }

    public function dontSeeCustomersInList($customersData)
    {
        $this->dontSee($customersData['input[name*=name]'], '#search_results');
    }

}