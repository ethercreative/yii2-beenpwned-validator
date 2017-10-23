Yii2 BeenPwned Validator
========================

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run
```sh
composer require ethercreative/yii2-beenpwned-validator
```
or add
```json
"ethercreative/yii2-beenpwned-validator": "*"
```
to the require section of your `composer.json` file.

Usage
=====
```php
public function rules()
{
    return [
        ['password', '\ethercreative\validators\BeenPwned'],
    ];
}
```

Todo
====

- [] Add option to check account
- [] Add option to check pastes
