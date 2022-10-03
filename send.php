<html>
<body>

<?php 
 $inputedusername= $_POST['username'];//getting username and password from the form 
 $inputedpassword= $_POST['password'];
 echo $inputedusername;//get rid when code finally works 
 require_once('rabbitMQLib.inc');//calls required files to connect to server

 $client = new rabbitMQClient();
 if (isset($argv[1]))
 {
 $msg = $argv[1];
 }
 else
 {
 $msg = "test message";
 }

 $request = array();
 $request['type'] = "Login";
 $request['username'] = $inputedusername;//sending username to server
 $request['password'] = $inputedpassword;//sending password to server
 $request['message'] = $msg;
//  $response = $client->send_request($request);
 $response = $client->publish($request);

 echo "client received response: ".PHP_EOL;
 print_r($response);
 echo "\n\n";
 
?>
 <br>
</body>
</html>