<?php
class Sample extends AlaneeModel {
	
	public function query($sql) {
		if($this->executeQuery($sql)) {
			return true;
		} else {
			return false;
		}
	}
}

?>