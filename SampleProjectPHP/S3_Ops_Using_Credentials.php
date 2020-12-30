<!DOCTYPE html>
<html>
<head> 
     <title> AWS PHP Tutorial</title>
</head>

<body>
   <div class="container">
   <center><h1> Listing S3 Buckets </h1></center>

<?php

// require the amazon sdk from your composer vendor dir
require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\Exception\AwsException;

define('AWS_KEY', '');
define('AWS_SECRET_KEY', '');
// $ENDPOINT = 'http://objects.dreamhost.com';

try{
    //Create a S3Client 

    // Instantiate the S3 class and point it at the desired host
    $client = new S3Client([
    'region' => '',
    'version' => '2006-03-01',

    'credentials' => [
        'key' => AWS_KEY,
        'secret' => AWS_SECRET_KEY
    ],
    // Set the S3 class to use objects.dreamhost.com/bucket
    // instead of bucket.objects.dreamhost.com
    //'use_path_style_endpoint' => true
    ]};

    //Listing all S3 Bucket
    $listResponse = $client->listBuckets();
    $buckets = $listResponse['Buckets'];
    foreach ($buckets as $bucket) {
        echo $bucket['Name'] . "\t" . $bucket['CreationDate'] . "\n";
    }

} catch (S3Exception $e){
    echo $e->getMessage() ."\n";
}
?>
</div>
</body>
</html>
