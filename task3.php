<?php
require_once('config.php');
class TableCreator {

	private $conn;

    /**

     * Calls parent constructor, then increments {@link $firstvar}

     */

    function __construct($conn) {
    	$this->conn = $conn;
        $this->create();
        $this->fill();

    }
	/**
	 * Method to generate random string
	 * @return string
	 */
	private function create(){
		$sql = "CREATE TABLE IF NOT EXISTS test (
		id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		script_name VARCHAR(25) NOT NULL,
		start_time datetime NOT NULL,
		end_time datetime NOT NULL,
		result enum('normal','illegal','failed','success') NOT NULL
		)";
		$this->conn->query($sql);
	}
	/**
	 * Method to generate random string
	 * @return string
	 */
	private function fill(){
		$script_name = $this->random_string();
		$start_date = $this->randomDate('2018-01-01 00:00:00', '2023-12-31 00:00:00');
		$end_date = $this->randomDate('2014-01-01 23:59:59', '2054-12-31 23:59:59');
		$result = $this->random_result();
		$stmt = $this->conn->prepare('INSERT INTO `test` (`script_name`, `start_time`, `end_time`, `result`) VALUES (?, ?, ?, ?)');
		$stmt->bind_param("ssss", $script_name, $start_date, $end_date, $result);
		$stmt->execute();
		return $this->conn->insert_id;
	}
	/**
	 * Method to generate random result
	 * @return string
	 */
	private function random_result(){
		$arr = array( "normal", "illegal", "failed", "success" );
 		$key = array_rand($arr);
		return $arr[$key];

	}
	/**
	 * Method to generate random string
	 * @return string
	 */
	private function random_string(){
		$characters = '0123456789abcdefghijklmnopqrstuvwxyz ';
		$randomString = '';	
		for ($i = 0; $i < 25; $i++) {
			$index = rand(0, strlen($characters) - 1);
			$randomString .= $characters[$index];
		}	
		return $randomString;
	}

	/**
	 * Method to generate random date between two dates
	 * @param $sStartDate
	 * @param $sEndDate
	 * @param string $sFormat
	 * @return bool|string
	 */

	function randomDate($sStartDate, $sEndDate, $sFormat = 'Y-m-d H:i:s') {
		// Convert the supplied date to timestamp
		$fMin = strtotime($sStartDate);
		$fMax = strtotime($sEndDate);
		// Generate a random number from the start and end dates
		$fVal = mt_rand($fMin, $fMax);
		// Convert back to the specified date format
		return date($sFormat, $fVal);
	}
	public function get(){
		$results = [];
		$result = mysqli_query($this->conn,  'SELECT * FROM test');

		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$results[] = $row;
			}
		  }
		return json_encode($results);
	}
}

$obj = new TableCreator($conn);
echo  $obj->get();
