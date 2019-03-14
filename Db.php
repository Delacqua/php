<?php	

	class Db {

		protected $servername;
		protected $username;
		protected $password;
		protected $dbname;

		protected $conn;
    	protected $result = array();


		public function __construct() {

			/* --------------------  */
			$this->servername = "localhost";
			$this->username = "root";
			$this->password = "";
			$this->dbname = "test";
			/* --------------------  */

			$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

			if ($this->conn->connect_error) {
			    die("Connection failed: " . $this->conn->connect_error);
			}


		}

		public function __destruct() {
			$this->conn->close();
		}

		public function getConnection() {
			return $this->$conn;
		}

		public function prendeTabella($tabella) {

			$result = $this->conn->query("SELECT * FROM $tabella");

			  if (!$result->num_rows > 0) {
			      http_response_code(404);
			      throw new Exception("MySQL error", $this->conn->errno);
			      exit();
			  }
			else {
			    $_result = $result->fetch_all(MYSQLI_ASSOC);
			}

        	return($_result);

    	}

	}