<?php

//User class to create a user
class User{
	//variable definitions
	private $firstName;
	private $lastName;
	private $gender;
	private $title;
	private $dateOfBirth;
	private $email;
	private $program;
	private $year;
	private $parish;
	private $hall;
	private $subGroup;
	private $phoneNumber;

	/*function to validate form to see if user entered the required data and assigns them to their
	respective variables. */
	public  function create($data = []){

		if(count($data) == 0)
			throw new Exception('No data to create user');

		if(isset($data['firstName']))
			$this->firstName = $data['firstName'];
		else
			throw new Exception('First name not found');


		if(isset($data['lastName']))
			$this->lastName = $data['lastName'];
		else
			throw new Exception('Last name not found');


		if(isset($data['phoneNumber']))
			$this->phoneNumber = $data['phoneNumber'];
		else
			throw new Exception('phoneNumber name not found');


		if(isset($data['gender']))
			$this->gender = $data['gender'];
		else
			throw new Exception('gender not found');


		if(isset($data['title']))
			$this->title = $data['title'];
		else
			throw new Exception('title name not found');


		if(isset($data['dateOfBirth']))
			$this->dateOfBirth = $data['dateOfBirth'];
		else
			throw new Exception('dateOfBirth name not found');


		if(isset($data['email']))
			$this->email = $data['email'];
		else
			throw new Exception('email name not found');


		if(isset($data['program']))
			$this->program = $data['program'];
		else
			throw new Exception('program name not found');


		if(isset($data['year']))
			$this->year = $data['year'];
		else
			throw new Exception('year name not found');

		if(isset($data['hall']))
			$this->hall = $data['hall'];
		else
			throw new Exception('hall name not found');

		if(isset($data['parish']))
			$this->parish = $data['parish'];
		else
			throw new Exception('parish name not found');


		if(isset($data['subGroup']))
			$this->subGroup = $data['subGroup'];
		else
			throw new Exception('subGroup name not found');

		return $this;

	}


	//functions to return the data to server side for processing
	function getFirstName(){
		return $this->firstName;
	}

	function getLastName(){
		return $this->lastName;
	}

	
	function getGender(){
		return $this->gender;
	}

	function getTitle(){
		return $this->title;
	}

	function getEmail(){
		return $this->email;
	}


	function getParish(){
		return $this->parish;
	}

	function getSubGroup(){
		return $this->subGroup;
	}

	function getDateOfBirth(){
		return $this->dateOfBirth;
	}

	function getPhoneNumber(){
		return $this->phoneNumber;
	}

	function getYear(){
		return $this->year;
	}

	function getProgram(){
		return $this->program;
	}

	function getHall(){
		return $this->hall;
	}
}