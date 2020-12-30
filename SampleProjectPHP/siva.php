<?php

require 'vendor/autoload.php';

use Aws\Credentials\CredentialProvider;
use Aws\S3\S3Client;
use Aws\Exception\AwsException;


$bucket = 'ulhastest123';

// Use the default credential provider
    //$provider = CredentialProvider::defaultProvider();
    $provider = CredentialProvider::instanceProfile();

    //Create a S3Client 

    $s3 = new S3Client([
        'region' => 'us-east-1',
        'version' => 'latest',
        'credentials' => $provider
    ]);




// Use the plain API (returns ONLY up to 1000 of your objects).
try {
    $objects = $s3->listObjects([
        'Bucket' => $bucket
    ]);
    foreach ($objects['Contents']  as $object) {
        echo $object['Key'] . PHP_EOL;
    }
} catch (S3Exception $e) {
    echo $e->getMessage() . PHP_EOL;
}

?>
