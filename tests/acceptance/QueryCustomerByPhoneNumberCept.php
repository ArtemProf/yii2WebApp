<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 11/02/2017
 * Time: 11:58
 */
use Step\Acceptance\CRMOperatorSteps;

$I = new CRMOperatorSteps($scenario);
$I->wantTo('add two different Customers to database');

$I->amInAddCustomersUi();
$firstCustomers = $I->imagineCustomers();
$I->fillCustomersDataForm($firstCustomers);
$I->submitCustomersDataForm();

$I->seeIAmInListCustomersUi();

$I->amInAddCustomersUi();
$secondCustomers = $I->imagineCustomers();
$I->fillCustomersDataForm($secondCustomers);
$I->submitCustomersDataForm();

$I->seeIAmInListCustomersUi();

$I = new CRMOperatorSteps($scenario);
$I->wantTo('query the Customers info using his phone number');

$I->amInQueryCustomersUi();
$I->fillInPhoneFieldWithDataForm($firstCustomers);
$I->clickSearchButton();

$I->seeIAmInListCustomersUi();
$I->seeCustomersInList($firstCustomers);
$I->dontSeeCustomersInList($secondCustomers);