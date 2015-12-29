<?php 
	include("connection.php"); 
	
	function confirm_query($result){
		if(!$result){
			die("Query Failed " . mysql_error());
		}
	}

	function redirect($location){
				header("Location:".$location);
	}

	function find_member($stockname,$unitmeasure){
		global $connection;
		$query = "SELECT * FROM members WHERE Lname = '{$Lname}' AND DOB = '{$DOB}' ";
		$result_set = mysql_query($query,$connection);
		confirm_query($result_set);
		if (mysql_num_rows($result_set)>0) {
			return true;
		}
		else {
			return false;
		}
	}

	function RegisterMember($Lname,$Fname,$Title,$Gender,$DOB,$ImageName,$Image,$Phone,$Email,$Program,$Year,$Hall,$Parish,$Subgroups,$RegDate){
		global $connection;

		// if (!find_member($Lname,$DOB)) {
			$query = "INSERT INTO members(id,Lname,Fname,Title,Gender,DOB,MemberImageName,MemberImage,Phone,Email,Program,Year,Hall,Parish,Subgroups,RegDate) 
				VALUES('','{$Lname}',{$Fname},{$Title},{$Gender},{$DOB},{$ImageName},'{$MemberImage}','{$Phone}','{$Email}','{$Program}','{$Year}','{$Hall}','{$Parish}','{$Subgroups}','{$RegDate}')";
			$result_set = mysql_query($query,$connection);
			confirm_query($result_set);
			if (mysql_affected_rows()>0) {
				echo "success";
			}
			else {
				echo "err2";
				
			}
		// }
		// else {
		
		// 	echo "err1";
		// }
		

	}


?>