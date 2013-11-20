<?php



require '../vendor/aws-autoloader.php';


use Aws\DynamoDb\DynamoDbClient;

use Aws\DynamoDb\Session\SessionHandler;

$key='AKIAI3HKBGP2QNR7TVHQ';
$secretkey='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';
$reg='sa-east-1';

 
$dynamoDb = DynamoDbClient::factory(array(
    'key'    => $key,
    'secret' => $secretkey,
    'region' => $reg
));

$sessionHandler = $dynamoDb->registerSessionHandler(array(
    'table_name' => 'sessions',
    'hash_key'                 => 'id',
    'session_lifetime'         => 3600,
    'consistent_read'          => true,
    'locking_strategy'         => null,
    'automatic_gc'             => 0,
    'gc_batch_size'            => 50,
    'max_lock_wait_time'       => 15,
    'min_lock_retry_microtime' => 5000,
    'max_lock_retry_microtime' => 50000,
));


//$sessionHandler->createSessionsTable(5, 5);
 

?>
