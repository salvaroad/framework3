
<?php
/**
 *instancia la clase database para una nueva conexion
 */
class AppModel
{
	protected $_db;

	public function __construct(){
		$this->_db = new Database();
		
	}
}

