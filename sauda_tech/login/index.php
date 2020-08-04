<?php

header("Content-Type: application/json; charset=UTF-8");

class api
{
	function login_uri()
	{
		if(isset($_POST['username']) && isset($_POST['password']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			$response;

			$uppercase = preg_match('@[A-Z]@', $password);
			$lowercase = preg_match('@[a-z]@', $password);
			$number    = preg_match('@[0-9]@', $password);

			$username_match_number = preg_match('@[0-9]@', $username);

			if($username_match_number)
			{
				$response["status"]=203;
				$response["msg"]="Failure: only characters allowed in username";
			}
			else if(strlen($password)<6)
			{
				$response["status"]=201;
				$response["msg"]="Failure: password should be of length 6";
			}
			else if((!$uppercase && !$lowercase) || !$number)
			{
				$response["status"]=202;
				$response["msg"]="Failure: password to have 1 character and 1 number";
			}
			else{
				$response["status"]=200;
				$response["msg"]="Success";
			}

			echo json_encode($response);
		}
		else
		{
			echo json_encode("Invalid request initiated !");
		}
	}
}

$api=new api();
$api->login_uri();

?>