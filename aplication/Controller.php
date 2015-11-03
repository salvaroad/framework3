<?php
/**
 * la clase AppCooontroller 
 * 
 */
abstract class AppController{

protected $_view;

/**
 * Este metodo ejecuta automaticamente a view 
 * hace una instancia de la classPDO
 * __construct()
 */
	public function __construct(){
		$this->_view = new View(new Request);
		$this->db = new classPDO();
		
	}
	/**
	 * este metodo se encarga de ver k funcion se va ejecutar 
	 * 
	 * function redirect(){
	 *  
	 * }
	 */

	protected function redirect($url =array()){
		$path ="";
		if ($url['controller']) {
			$path .=$url['controller'];

		}
		if ($url['action']) {
			$path .='/'.$url['action'];

		}
		
		header("LOCATION:".APP_URL.$path);
	  }
}

	