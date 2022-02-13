<?php

require 'aws-autoloader.php';

use Aws\SecretsManager\SecretsManagerClient;
use Aws\Exception\AwsException;

$client = new SecretsManagerClient([
 'version' => 'latest',
 'region' => 'ap-southeast-1'
]);


$result = $client->getSecretValue([
 'SecretId' => '<secret-arn>',
 'VersionStage' => 'AWSCURRENT',
]);

$secretjson = $result['SecretString'];

$secrets = json_decode($secretjson,true);


define( 'DB_NAME', $secrets['dbname']);
define( 'DB_USER', $secrets['username']);
define( 'DB_PASSWORD', $secrets['password']);
define( 'DB_HOST', $secrets['host']);
