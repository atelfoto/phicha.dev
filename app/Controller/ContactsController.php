<?php
App::uses('AppController', 'Controller');
class ContactsController extends AppController{
	public $components = array ('Session','Security');
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index');
	}
	function index(){
		if($this->request->is('post')){
		if (!empty($this->request->data['Contact']['website'])) {
			$this->Session->setFlash(__("Your Mail us is reached."),'notif',array('class'=>"success",'type'=>'ok-sign'));
			$this->request->data = array();
		}else{
 				if($this->Contact->send($this->request->data['Contact'] )){
 					$this->Session->setFlash(__("Thank you.Your Mail Us is reached."),'notif',array('class'=>"success", 'type'=>'ok-sign'));
 					$this->request->data = array();
 				} else{
					$this->Session->setFlash(__("Thank you to correct your fields."),"notif",array('class'=>'danger', 'type'=>'info-sign'));
 				}
			}
		}
	}
}
