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
			if($username=="vaibhav" && $password=="abcd12")
			{
				$response["status"]=200;
				$response["msg"]="Success";
			}
			else if($username=="vaibhav" && $password=="abcd")
			{
				$response["status"]=201;
				$response["msg"]="Failure: password should be of length 6";
			}
			else if($username=="vaibhav" && $password=="abcdef")
			{
				$response["status"]=202;
				$response["msg"]="Failure: password to have 1 character and 1 number";
			}
			else if($username=="1234" && $password=="abcd12")
			{
				$response["status"]=203;
				$response["msg"]="Failure: only characters allowed in username";
			}
			else{
				$response["status"]=204;
				$response["msg"]="Failure: no match case found";
			}

			echo json_encode($response);
		}
		else
		{
			echo "Invalid request initiated !";
		}
	}
}

$api=new api();
$api->login_uri();

?>