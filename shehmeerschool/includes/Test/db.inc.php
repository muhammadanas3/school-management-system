<?php

class DB {
	private $servername;
	private $username;
	private $password;
	private $db_name;

	public function connect()
	{
		$this->$servername = "localhost";
		$this->$username = "abc";
		$this->$password = "123";
		$this->db_name = "stf_school";

		$conn = new sqli($this->$servername, $this->$username, $this->$password, $this->$db_name);

		return $conn;
	}
}

?>