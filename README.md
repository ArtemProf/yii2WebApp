# Yii2 Web App in [Yii2]

Using [InnoDB](http://www.mysql.com/) as a storage.


### Description
Source code for example app from the book Web Application Development with Yii2 and PHP 
by Mark Safronov and Jeffrey Winesett.

Code was written by Artem Drachkov.

Code is a fully working sample of the application according to Yii 2.0.0-beta tools.
Application uses Acceptance tests.

### Installation
1. Install dependencies
```bash
composer update
```
2. Create a new db, tou may use name 'crmapp'
3. Edit common/config/db.php

4. Link your Apache or NGINX with public directory:
**frontend/web**

### Developing
```
Use 'crmapp.com' as a production alias
Use 'crmapp.dev' as a development alias
```

### Production
Remove db.local.php

### General Features
Simple CRM.
- Adding a new customer with Name, Phone, BD, note
- Looking for a customer by phone number 


### Packege managers
- composer