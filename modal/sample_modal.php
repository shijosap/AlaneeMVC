<?php
class Sample extends AlaneeModal {
	
	public function query($sql) {
		if($this->executeQuery($sql)) {
			return true;
		} else {
			return false;
		}
	}
}

?>