<?php

include("../includes/connection.php");
include('../models/user.php');

	//Image upload section
	if(getimagesize($_FILES['image']['tmp_name']) == FALSE)
    {
        echo "<div class='alert-danger'>Please select an image!</div>";
        echo "<script>
                setTimeout(\"location.href = '../member-registration.php';\",2000);
              </script>";
    }
    else 
    {
        $image = addslashes($_FILES['image']['tmp_name']);
        $name = addslashes($_FILES['image']['name']);
        $image = file_get_contents($image);
        $image = base64_encode($image);

        echo print_r($name);
	}

	// print_r($_FILES);
	// print_r($_POST);
	// echo $name;
	// return;

	date_default_timezone_set('UTC');
	$RegDate = Date('Y-m-d');

		$Title = $_POST['Title'];
		$Gender = $_POST['Gender'];
		$DOB = $_POST['DOB'];
		$Lname = $_POST['Lastname'];
		$Fname = $_POST['Firstname'];
		$Phone = $_POST['Phone'];
		$Email = $_POST['Email'];
		$Program =$_POST['Program'];
		$Year = $_POST['Year'];
		$Hall = $_POST['Hall'];
		$Parish = $_POST['Parish'];
		$SubGroup = implode(',',  $_POST['subGroup']);


$userDetails = array(
	'title' => $Title,
	'gender' => $Gender,
	'dateOfBirth' => $DOB,
	'firstName' => $Fname,
	'lastName' => $Lname,
	'phoneNumber' => $Phone,
	'email' => $Email,
	'program' => $Program,
	'year' => $Year,
	'hall' => $Hall,
	'parish' => $Parish,
	'subGroup' => $SubGroup
	);



$user = new User();

$newUser = $user->create($userDetails);


echo RegisterMember($newUser, $RegDate, $name, $image);


function RegisterMember(User $newUser, $RegDate, $name, $image){
	global $connection;


		// if (!find_member($Lname,$DOB)) {
	$query = "INSERT INTO members(id,Lname,Fname,Title,Gender,DOB,MemberImageName,MemberImage,Phone,Email,Program,Year,Hall,Parish,Subgroups,RegDate) 
	VALUES(
		'',
		'{$newUser->getLastName()}',
		'{$newUser->getFirstName()}',
		'{$newUser->getTitle()}',
		'{$newUser->getGender()}',
		'{$newUser->getDateOfBirth()}',
		'{$name}',
		'{$image}',
		'{$newUser->getPhoneNumber()}',
		'{$newUser->getEmail()}',
		'{$newUser->getProgram()}',
		'{$newUser->getYear()}',
		'{$newUser->getHall()}',
		'{$newUser->getParish()}',
		'{$newUser->getSubGroup()}',
		'{$RegDate}'
		)";

	// mysql_query($query,$connection);
	// // confirm_query($result_set);
	// if (mysql_affected_rows() == 1) {
	// 	echo "success";
	// }
	// else {
	// 	echo "err2";

	// }

$mysqli = new Mysqli('localhost', 'root', 'PASSword1', 'paxromanadata');

return $mysqli->query($query);

}
		// }
		// else {

		// 	echo "err1";
		// }



function confirm_query($result){
	if(!$result){
		die("Query Failed " . mysql_error());
	}
}
?>