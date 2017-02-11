<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 11/02/2017
 * Time: 11:58
 */

$I = new \AcceptanceTester\CRMOperatorSteps($scenario);
$I->wantTo('add two different customers to database');

$I->amInAddCustomerUi();
$firstCustomer = $I->imagineCustomer();
$I->fillCustomerDataForm($firstCustomer);
$I->submitCustomerDataForm();

$I->seeIAmInListCustomerUi();

$I->amInAddCustomerUi();
$secondCustomer = $I->imagineCustomer();
$I->fillCustomerDataForm($secondCustomer);
$I->submitCustomerDataForm();

$I->seeIAmInListCustomerUi();

$I = new \AcceptanceTester\CRMOperatorSteps($scenario);
$I->want('query the customer info using his phone number');

$I->amInQueryCustomerUi();
$I->fillInPhoneFiledWithDataFrom($firstCustomer);
$I->clickSearchButton();

$I->seeIAmInListCustomerUi();
$I->seeCustomerInList($firstCustomer);
$I->dontSeeCustomerInList($secondCustomer);