<?php
/**
 * esta clase es el modelo de la aplicacion 
 * class TareaModel{
 * 
 * }
 */
class TareaModel extends AppModel
{
	/**
	 * __ccontructor padre
	 * function __construct(){
	 * 
	 * }
	 */
	public function __construct(){
		parent::__construct();
	}
	/**
	 * consulta las tareas en la bd
	 * function getTareas(){
	 * 
	 * }
	 */

	public function getTareas(){
		$tareas = $this->_db->query("SELECT * FROM tareas");
		
		return $tareas->fetchall();
	}
}
