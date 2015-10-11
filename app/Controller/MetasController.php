<?php
App::uses('AppController', 'Controller');
class MetasController extends AppController{

	function admin_index($id=null){
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Meta->save($this->request->data)) {
				$this->Session->setFlash(__('This has been saved.'), 'notif', array('class' => 'alert alert-success'));
				return $this->redirect(array('controller'=>'portfolios','action' => 'index',"#"=> "meta","admin"=>true));

			} else {
				$this->Session->setFlash(__('This could not be saved. Please, try again.'), 'notif', array('class' => 'alert alert-danger'));
			}
		}

	}

}
