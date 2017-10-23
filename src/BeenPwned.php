<?php

namespace ethercreative\validators;

use Yii;
use GuzzleHttp\Client;

class BeenPwned extends \yii\validators\Validator
{
    private $client;

    public $message;

    public function init()
    {
        parent::init();

        $this->client = new Client([
            'base_uri' => 'https://haveibeenpwned.com/api/v2/',
            'exceptions' => false,
        ]);

        if ($this->message === null)
            $this->message = Yii::t('yii', 'That password has been compromised, please choose another.');
    }

    public function validateValue($value)
    {
        $result = $this->client->request('GET', 'pwnedpassword/' . sha1($value), [], true);
        $statusCode = $result->getStatusCode();

        if ($statusCode == 200)
            return [$this->message, []];

        return null;
    }
}
