<?php 
include "../include/dbconnection.php";

$apiKey = 'b361dc54ca90a4dd02efaf412ed54f9a';
$apipath = "http://44.237.39.200:8080/index/";


$email=$_POST['email'];
$flag=1;


$otp = mt_rand(1000, 9999);


    
    if($flag==1)
    {
        $user = mysqli_query($connection,"select * from `admins_admin` where `email`='$email'    ");
    
        $count = mysqli_num_rows($user);
        $row = mysqli_fetch_array($user);

        if($count > 0)
        {  


            $tmp='<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2"><div style="margin:50px auto;width:70%;padding:20px 0"><div style="border-bottom:1px solid #eee"><a href="" style="font-size:1.4em;color: #727272;text-decoration:none;font-weight:600">Relay</a></div><p style="font-size:1.1em">Hi, '.$row["firstName"].'</p><p> Use the following OTP to Reset Password.</p><h2 style="background: #727272;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;"> '.$otp.'</h2><hr style="border:none;border-top:1px solid #eee" /><div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
              </div></div></div>';
            $btn = '';
		$to = $email;

		$content = mysqli_real_escape_string($connection,$tmp);
		$title ="OTP";
		$param = 'n';
		$id = '';
		$subject = "Reset Password";
		$img = "";

		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => $apipath."send_eventmail",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "POST",
			CURLOPT_POSTFIELDS =>"{
				\"to\":\"$to\"\r\n,
				\"title\":\"$title\"\r\n,
				\"content\":\"$content\"\r\n,
				\"param\":\"$param\"\r\n,
				\"id\":\"$id\"\r\n,
				\"btn\":\"$btn\"\r\n,
				\"img\" : \"$img\"\r\n,
				\"subject\":\"$subject\"\r\n
			}",
			CURLOPT_HTTPHEADER => array(
				"apitoken: ".$apiKey,
				"Content-Type: application/json"
			),
		));
		$response = curl_exec($curl);
		curl_close($curl);



            $user = mysqli_query($connection,"UPDATE `admins_admin` SET `otp`='".$otp."' where `email`='$email'    ");
            $_SESSION["forgetEmail"]=$email;



            echo  "1";
            }        
        else
        {
            echo "3";
        }
    }
