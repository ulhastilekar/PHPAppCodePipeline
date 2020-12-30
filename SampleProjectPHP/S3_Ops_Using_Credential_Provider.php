<!DOCTYPE html>
<html>
<head> 
     <title> AWS PHP Tutorial</title>
    <link rel="stylesheet" href="../library/css/bootstrap.min.css">
</head>

<body>
   <div class="container">
   <center><h1> Listing S3 Buckets </h1></center>

<?php

require 'vendor/autoload.php';

use Aws\Credentials\CredentialProvider;
use Aws\S3\S3Client;  
use Aws\Exception\AwsException;
date_default_timezone_set("Asia/Kolkata");

try{ 

    // Use the default credential provider
    //$provider = CredentialProvider::defaultProvider();
    $provider = CredentialProvider::instanceProfile();

    //Create a S3Client 
 
    $s3Client = new S3Client([
	'region' => 'us-east-1',
        'version' => 'latest',
        'credentials' => $provider
    ]);

    //Listing all S3 Bucket
    $buckets = $s3Client->listBuckets();
    //echo $buckets;

    foreach ($buckets['Buckets'] as $bucket) {
       echo $bucket['Name'] . "\n\n";
    }

} catch (S3Exception $e){
    echo $e->getMessage() ."\n";
}      
?>
</div>
</body>
</html>
