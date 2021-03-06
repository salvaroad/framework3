<?php
/**
 * clase View es para las vistas
 */

class View{

	private $_controlador;


	public function __construct(Request $peticion){
		$this->_controlador = $peticion->getControlador();
	}
	/**
	 * redirecciona a la vista solicitada
	 *
	 * @param  string $vista vista solicitada
	 * @return  vista 
	 * function redentizar(){
	 * 
	 * 
	 * }
	 * 
	 */
	public function renderizar($vista){


		 $rutaView =ROOT.'views'
		 .DS.$this->_controlador.DS.$vista.'.phtml';

		 
		 $_layoutParams = array(
		 	'ruta_css'=>APP_URL.'views/layouts/'.DEFAULT_LAYOUT.'/css/',
		 	'ruta_img'=>APP_URL.'views/layouts/'.DEFAULT_LAYOUT.'/img/',
		 	'ruta_js'=>APP_URL.'views/layouts/'.DEFAULT_LAYOUT.'/js/'
		 	);
	
		if(is_readable($rutaView)){
		
			
		    include_once ROOT.'views'.DS.'layouts'.DS.DEFAULT_LAYOUT.DS.'header.php';    
          	include_once $rutaView;
			include_once ROOT.'views'.DS.'layouts'.DS.DEFAULT_LAYOUT.DS.'footer.php';
			

		}else{
			throw new Exception("Error de Vista- view");
			
		}

		
    }
}