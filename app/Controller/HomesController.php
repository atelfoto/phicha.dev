<?php
App::uses('AppController', 'Controller');
/**
 * Carousels Controller
 *
 * @property Carousel $Carousel
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class HomesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

/**
 * [$cacheAction description]
 * @var array
 */
	public $cacheAction = array(
		'index'=>'2 DAY',
		'view'=>'2 DAY');

	// public function index()	{
	// 	$this->layout= 'home';
	// 	$pages = $this->Home->find('all'
	// 		// ,array(
	// 		// 'conditions'=>array('type'=>'image/jpeg','online'=>1),
	// 		// 'fields'    =>array('name','photo','photo_dir','class')
	// 	//	 )
	// 		);
	// 	return $pages;

	//  }
	// public function index($id)	{
	// 	//$this->set('language', Configure::read('Config.language'));
	// 	// $this->Home->recursive=0;
	// 	// $this->set("homes");
	// 	$this->layout= 'home';
	// 	$this->Home->recursive = 0;
	// 	$this->Home->id = $id;

	// 		$this->request->data = $this->Home->read();
	// }
public function index() {
		$this->layout= 'home';
		$this->Home->recursive = 0;
		$this->set('homes', $this->Paginator->paginate());
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Home->recursive = 0;
		$this->set('homes', $this->Paginator->paginate());
	}



/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Home->create();
			if ($this->Home->save($this->request->data)) {
				$this->Session->setFlash(__('This page has been saved.'), 'notif', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('This page could not be saved. Please, try again.'), 'notif', array('class' => 'alert alert-danger'));
			}
		}
		$users = $this->Home->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Home->exists($id)) {
			throw new NotFoundException(__('Invalid carousel'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Home->save($this->request->data)) {
				$this->Session->setFlash(__('This page has been saved.'), 'notif', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('This page could not be saved. Please, try again.'), 'notif', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Home.' . $this->Home->primaryKey => $id));
			$this->request->data = $this->Home->find('first', $options);
		}
		$users = $this->Home->User->find('list');
		$this->set(compact('users'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Home->id = $id;
		if (!$this->Home->exists()) {
			throw new NotFoundException(__('Invalid page'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Home->delete()) {
			$this->Session->setFlash(__('This page has been deleted.'), 'notif', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('This page could not be deleted. Please, try again.'), 'notif', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
