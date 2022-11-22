<?php
ob_start();
if(!isset($_SESSION)){
	session_start();
}



//  echo phpinfo();exit;
// $serverUsename = "relay_db";
// $serverPassword =  'relay_db';
// $host="relay-db.cqrogiwnq1mr.me-south-1.rds.amazonaws.com";

// $serverUsename = "root";
// $serverPassword =  '';
// $host="localhost";

// $connection = mysqli_connect($host, $serverUsename, $serverPassword) or die("Database Connection Failed.");
// if(!$connection)
// {
// 	echo "connection fail";

// 	///die("Database Connection Failed : " . mysqli_error($connection));

// }
// else
// {

// 	 mysqli_select_db($connection, "relay") or die("Database Selection Failed : " . mysqli_error($connection));


	 

	// $base="http://localhost:8082/Admin/";

	define("base","http://localhost:8082/Admin/");


	// define("base","https://7ndgewffd0.execute-api.eu-west-1.amazonaws.com/Admin/");

	// $base ="https://7ndgewffd0.execute-api.eu-west-1.amazonaws.com/Admin/";
	$token="3uad9e6aa71219678fd031cd6ebb1h32";
// }



// function upload_image($FILES){
    
//     $url =base."updateAdminProfile"; // e.g. http://localhost/myuploader/upload.php // request URL
//     $filesize = $FILES['size'];
    
//         $headers = array(""); // cURL headers for file uploading
//         $cfile = new CURLFile(
//           $FILES['tmp_name'],
//           $FILES['type'],
//           $FILES['name'],
          
//           );
//         $postfields = array("image" => $cfile);
//         $ch = curl_init();
//         curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
// 	      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//         $options = array(
//             CURLOPT_URL => $url,
//             CURLOPT_HEADER => true,
//             CURLOPT_POST => 1,
//             CURLOPT_HTTPHEADER => $headers,
//             CURLOPT_POSTFIELDS => $postfields,
//             CURLOPT_INFILESIZE => $filesize,
//             CURLOPT_RETURNTRANSFER => true,

//         ); // cURL options
//         curl_setopt_array($ch, $options);
//         $response = curl_exec($ch);
//         $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
//         $header = substr($response, 0, $header_size);
//         $body = substr($response, $header_size);
//         if(curl_exec($ch) === false)
//         {
//             return 'Curl error: ' . curl_error($ch);
//         }
//         else
//         {
//             return $body;
//         }
        
//         curl_close($ch);
  
//   }

?>