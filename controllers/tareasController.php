<?php

/**
 * clase tareasController.
 */

class tareasController extends AppController
{
	public function __construct(){
		parent::__construct();
	}
/**
*la funcion index carga la vista index de la carpeta tareas
* @return index
 */


	public function index(){
		$this->_view->titulo = "Listado de tareas";
		//$this->_view->tareas = $this->db->find('tareas', 'all');
		
		 $conditions = array('conditions'=>'categorias.id=tareas.categoria_id order by tareas.id');

		$this->_view->tareas=$this->db->find('tareas,categorias','all', $conditions);

		$this->_view->renderizar('index');


		//$tareas = $this->loadmodel("tarea");
		//$this->_view->tareas = $tareas->getTareas();
		// TITULO QUE SE VISUALZARA EN LA URL.
		//$this->_view->renderizar("index");

	}

     /**
      * el metodo edit es parav editar una tarea
      *
      * @param  int $id de la tarea a eliminar 
      * @return string  vista  semanda la vista para editar 
      * function edit(){
      * }
      */


	public function edit($id = NULL){
	if ($_POST){
			if($this->db->update('tareas', $_POST)){
	           $this->redirect(
	      	          array('controller'=>'tareas','action'=>'index'
	      	          	)
	      	        );
        }else{
        	$this->redirect(
        	          array(
        	                'controller'=>'tareas',
        	                'action'=>'edit/'.$_POST['id']
        	               )
        	          );
                }

        }else{
 
		$conditions = array(
			      'conditions'=>'id='.$id);
		$this->_view->tarea=$this->db->find(
			'tareas',
			'first',
			$conditions
		);

//hace una consulta y los mostra en el formulario
$this->_view->categoria = $this->db->find('categorias', 'all');


		$this->_view->titulo="Editar Tarea";
		$this->_view->renderizar('edit');


	}
}

   /**
    * add  este metodo es para agragar tareas
    * @return string  vista agregar tarea 
    * function add(){ 
    * }
    * 
    */
public function add(){

		if ($_POST){
			if($this->db->save('tareas',$_POST)){
	           $this->redirect(
	      	          array('controller'=>'tareas','action'=>'index'
	      	          	)
	      	        );
        }else{$this->redirect(
        	                  array(
        	                  	'controller'=>'tareas','action'=>'add'
        	               )
        	          );
    }
		}else{


        

$this->_view->categoria = $this->db->find('categorias', 'all');

			$this->_view->titulo="Agregar tarea";
			$this->_view->renderizar=("add");


		}
		$this->_view->renderizar('add');

	  }
       /**
        * delete es para eliminar un registro
        *
        * @param  int  $id indetificador de tareas a eliminar 
        * function delete(){
        * }
        */
    public function delete($id){
	$condition='id='.$id;
	if ($this->db->delete('tareas', $condition)) {
		$this->redirect(array('controller'=>'tareas'));
	  }
   }

}
