<?php

class User extends DB {

	public function getAllStudents()
	{
		$sql = "SELECT * FROM student";
		$result = $this->connect()->query(sql);
		if ($result->num_rows > 0) {
			while ($row = $result->fetch_assoc()) {
				$data[] = $row;
			}
			return $data;
		}
	}
}

?>