<!DOCTYPE html>
<html>
<head> 
     <title> AWS PHP Tutorial</title>
</head>

<body>
   <div class="container">
   <center><h1> Listing S3 Buckets </h1></center>

<?php

require 'vendor/autoload.php';

use Aws\S3\S3Client;  
use Aws\Exception\AwsException;

try{ 
    //Create a IamClient 
 
    $s3C:lient = new s3Client([
        'region' => 'us-east-1',
        'version' => 'latest'
    ]);

    //Listing all S3 Bucket
    $buckets = $s3Client->listBuckets();
    foreach ($buckets['Buckets'] as $bucket) {
       echo $bucket['Name'] . "\n";
    }

} catch (S3Exception $e){
    echo $e->getMessage() ."\n";
}      
?>
</div>
</body>
</html>
