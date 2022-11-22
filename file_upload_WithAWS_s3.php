<?php
    use Aws\S3\S3Client;
    use Aws\S3\Exception\S3Exception;


    //$awsData = mysqli_fetch_array(mysqli_query($connection,"SELECT `S3ACCESSKEY`, `S3SECRETKEY` FROM `credential` WHERE `credentialId` = '1'"));

    // if (!defined('awsAccessKey')) define('awsAccessKey', $awsData['S3ACCESSKEY']);
    // if (!defined('awsSecretKey')) define('awsSecretKey', $awsData['S3SECRETKEY']);

    if (!defined('awsAccessKey')) define('awsAccessKey', 'AKIAVBA6XWE263327TES');
    if (!defined('awsSecretKey')) define('awsSecretKey', '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');
    
    $bucket="relayimage";

    $clientS3 = S3Client::factory(
        array(
            'credentials' => [
            'key'    => awsAccessKey,
            'secret' => awsSecretKey,],
            'region' =>  "us-west-2",
            'version' => "2006-03-01",
            'http'    => ['verify' => false],
            'scheme' =>'http',
            'ACL'   => 'public-read'
        )
    );


    /*
    1) ----------------IMAGE UPLOAD FROM BASE TO S3 BUCKET ---------------------------
    $client->putObject(array(
            'Bucket'=>$bucket,
            'Key' =>  $fileNewName,
            // 'SourceFile' => $image_base64,
            'StorageClass' => 'REDUCED_REDUNDANCY',
            'ACL'        => 'public-read',
            'Body'            => $image_base64,
            'ContentType'     => 'image/' . $image_type,
            'ACL'             => 'public-read'
        ));


    2) ------------------IMAGE UPLOAD FROM TMP PATH TO S3 BUCKET --------------------------
    $client->putObject(array(
            'Bucket'=>$bucket,
            'Key' =>  $_FILES['name'],
            'SourceFile' => $_FILES['tmp_name'],
            'StorageClass' => 'REDUCED_REDUNDANCY',
            'ACL'        => 'public-read'
        ));

    // $message = "S3 Upload Successful.";
    // $s3file='https://'.$bucket.'.s3.amazonaws.com/'.$fileNewName;
    //echo "<img src='$s3file'/>";
    // echo 'S3 File URL:'.$s3file;
*/


///prefix bucket path : https://andersenbucket.s3.us-west-2.amazonaws.com/

    
?>