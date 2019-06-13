<?php

class ViewUser extends User {

	public function showAllStudents()
	{
		$datas = $this->getAllStudents();
		foreach ($datas as $data) {
			echo $data['Name'];
		}
	}
}

?>