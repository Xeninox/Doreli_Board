<?php
/**
Getting the database credentials
*/
require_once('dbinfo.php');

/**
* 
*/
class DatabaseConnection
{
	/**
	Member variables of the database class
	*/
	public $db_connection;
	public $db_result;

	/**
	*Method to connect to the database
	*@return true or false
	*/
	public function connect(){
		$this->db_connection = mysqli_connect(SERVER, USERNAME, PASSWORD, DBNAME);
		if (mysqli_connect_errno()){
			return false;
		} else {
			return true;
		}
	}

	/**
	*Method to return the db connection object
	*@return db_connection or null
	*/
	public function getconnection(){
		if($this->connect()){
			return $this->db_connection;
		} else {
			return null;
		}
	}

	/**
	*Method to query the database
	*@return true or false
	*@param sql query to be executed
	*/
	public function query($sql){
		// check if the connection is successful
		if (!$this->connect()){
			return false;
		} 

		$this->db_result = mysqli_query($this->db_connection, $sql);
		if($this->db_result == false){
			return false;
		} else {
			return true;
		}
	}

	/**
	*Method to fetch from the database
	*@return true or false
	*/
	public function fetch(){
		// check if the results has some content
		if($this->db_result == false){
			return false;
		}
		// return result
		return mysqli_fetch_assoc($this->db_result);
	}

	public function fetchResultObject(){
		// check if the results has some content
		if($this->db_result == false){
			return null;
		}
		// return result
		return $this->db_result;
	}
}
?>