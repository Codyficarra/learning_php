<?php

//abstract classes cannot be directly called.
//They make for good base classes that hold other extension classes.
abstract class Customer{
	protected $id;
	protected $name;
	protected $email;
	protected $balance;

	public function __construct($id, $name, $email, $balance){
		$this->id = $id;
		$this->name = $name;
		$this->email = $email;
		$this->balance = $balance;
	}

	abstract public function getID();

	abstract public function getName();

	abstract public function getEmail();

	abstract public function getBalance();
}//end of class Customer

//$customer = new Customer(12, 'cody ficarra', 'cody@gmail.com', 44.32);

class Subscriber extends Customer{
	public $plan;

	public function __construct($id, $name, $email, $balance, $plan){
		parent::__construct($id, $name, $email, $balance);
		$this->plan = $plan;
	}

	public function getID(){
		return $this->id;
	}

	public function getName(){
		return $this->name;
	}

	public function getEmail(){
		return $this->email;
	}

	public function getBalance(){
		return $this->balance;
	}

}//end of class Subscriber

class User{
	public $username;
	public $password;
	public static $passwordlength = 5;


	public static function getPasswordLength(){
		return self::$passwordlength;
	}
}//end of class User


$subscriber = new Subscriber(12, 'cody ficarra', 'cody@gmail.com', 44.32, 'pro');

echo nl2br("This is the first line. \n");

echo nl2br("Customer ID: ");

echo $subscriber->getID();

echo nl2br("\nCustomer Name: ");

echo $subscriber->getName();

echo nl2br("\nCustomer Email: "); 

echo $subscriber->getEmail();

echo nl2br("\nCustomer Balance: ");

echo $subscriber->getBalance();

echo nl2br("\nTheir password length is: ");

echo User::getPasswordLength();

?>
