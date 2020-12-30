<?php
/**
 * Copyright 2010-2019 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * This file is licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License. A copy of
 * the License is located at
 *
 * http://aws.amazon.com/apache2.0/
 *
 * This file is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR
 * CONDITIONS OF ANY KIND, either express or implied. See the License for the
 * specific language governing permissions and limitations under the License.
 *
 * If you need more information about configurations or implementing the sample code, visit the AWS docs:
 * https://aws.amazon.com/developers/getting-started/php/
 *
 */

require 'vendor/autoload.php';

use Aws\Credentials\CredentialProvider;
use Aws\SecretsManager\SecretsManagerClient; 
use Aws\Exception\AwsException;
date_default_timezone_set("Asia/Kolkata");

/**
 * In this sample we only handle the specific exceptions for the 'GetSecretValue' API.
 * See https://docs.aws.amazon.com/secretsmanager/latest/apireference/API_GetSecretValue.html
 * We rethrow the exception by default.
 *
 * This code expects that you have AWS credentials set up per:
 * https://docs.aws.amazon.com/sdk-for-php/v3/developer-guide/guide_credentials.html
 */

// Create a Secrets Manager Client 
$client = new SecretsManagerClient([
        'region' => 'us-east-1',
        'version' => 'latest',
        'credentials' => $provider 
]);

//$secretName = '<<{{MySecretName}}>>';
$secretName = 'MasterBuilder_RDS_DB';

try {
    $result = $client->getSecretValue([
        'SecretId' => $secretName,
    ]);

} catch (AwsException $e) {
    $error = $e->getAwsErrorCode();
    if ($error == 'DecryptionFailureException') {
        // Secrets Manager can't decrypt the protected secret text using the provided AWS KMS key.
        // Handle the exception here, and/or rethrow as needed.
        throw $e;
    }
    if ($error == 'InternalServiceErrorException') {
        // An error occurred on the server side.
        // Handle the exception here, and/or rethrow as needed.
        throw $e;
    }
    if ($error == 'InvalidParameterException') {
        // You provided an invalid value for a parameter.
        // Handle the exception here, and/or rethrow as needed.
        throw $e;
    }
    if ($error == 'InvalidRequestException') {
        // You provided a parameter value that is not valid for the current state of the resource.
        // Handle the exception here, and/or rethrow as needed.
        throw $e;
    }
    if ($error == 'ResourceNotFoundException') {
        // We can't find the resource that you asked for.
        // Handle the exception here, and/or rethrow as needed.
        throw $e;
    }
}
// Decrypts secret using the associated KMS CMK.
// Depending on whether the secret is a string or binary, one of these fields will be populated.
if (isset($result['SecretString'])) {
    $secret = $result['SecretString'];
} else {
    $secret = base64_decode($result['SecretBinary']);
}


// Decode the secret json
$secrets = json_decode( $secret, true );

//echo( '<p>hostname/ipaddress: ' . $secrets[ 'host' ] . '</p><p>username: ' . $secrets[ 'username' ] . '</p><p>password: ' . $secrets[ 'password' ] . '</p><p>dbname: ' . $secrets[ 'dbname' ] . '</p>' );

echo('<h1> Amazon RDS : Details provided by AWS Secrets Manager</h1>')

echo( '<p>hostname/ipaddress: ' . $secrets[ 'host' ] . '</p><p>username: ' . $secrets[ 'username' ]  . '</p><p>dbname: ' . $secrets[ 'dbname' ] . '</p>' );

//echo '<script>alert("Welcome to Geeks for Geeks")</script>'; 


?>

<!-- Creating beautiful HTML tables with CSS : https://dev.to/dcodeyt/creating-beautiful-html-tables-with-css-428l -->
<style>
    .content-table {
      border-collapse: collapse;
      margin: 25px 0;
      font-size: 0.9em;
      min-width: 400px;
    }

    .content-table caption {
      background-color:  #e67e22;
      color:  #faf6f6;
      text-align: centre;
      font-weight: bold;

      border-radius: 5px 5px 0 0;
      overflow: hidden;
      box-shadow: 0 0 20px rgba(0,0,0, 0.15);

      padding: 12px 15px;
    }

    .content-table thead tr {
      background-color:  #77d414;
      color: #ffffff;
      text-align: left;
      font-weight: bold;
    }

    .content-table th,
    .content-table td {
      padding: 12px 15px;

    }

    .content-table tbody tr{
        border-bottom:1px solid #dddddd;

    }

    .content-table tbody tr:nth-of-type(even){
        background-color:#f3f3f3;
    }

    .content-table tbody tr:last-of-type{
        border-bottom:2px solid  #77d414;
    }

    .content-table tbody tr.active-row{
      font-weight: bold;
      color:  #77d414;
    }
</style>

<body>
<table class="content-table">
  <caption>Monthly savings</caption>
  <thead>
       <tr>
         <th>Firstname</th>
         <th>Lastname</th>
         <th>Age</th>
       </tr>
  </thead>
  <tbody>
       <tr class="active-row">
         <td>Ulhas</td>
         <td>Tilekar</td>
         <td>42</td>
       </tr>
       <tr>
         <td>Vaishali</td>
         <td>Tilekar</td>
         <td>40</td>
       </tr>
       <tr>
         <td>Soham</td>
         <td>Tilekar</td>
         <td>15</td>
       </tr>
       <tr>
         <td>Narayani</td>
         <td>Tilekar</td>
         <td>11</td>
       </tr>
  </tbody>
</table>
</body> 
