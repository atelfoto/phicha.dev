<?php
App::uses('AppController', 'Controller');
/**
 * Enews Controller
 *
 * @property Enews $Enews
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class EnewsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Enews->recursive = 0;
		$this->set('enews', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Enews->exists($id)) {
			throw new NotFoundException(__('Invalid enews'));
		}
		$options = array('conditions' => array('Enews.' . $this->Enews->primaryKey => $id));
		$this->set('enews', $this->Enews->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	// public function add() {
	// 	if ($this->request->is('post')) {
	// 		$this->Enews->create();
	// 		if ($this->Enews->save($this->request->data)) {
	// 			$this->Flash->success(__('The enews has been saved.'));
	// 			return $this->redirect(array('action' => 'index'));
	// 		} else {
	// 			$this->Flash->error(__('The enews could not be saved. Please, try again.'));
	// 		}
	// 	}
	// }

/**
 * send method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Enews->create();
			if ($this->Enews->save($this->request->data)) {
				//$this->Flash->success(__('Thanks your Email has been saved.See you later'));
				$this->Session->setFlash(__('Thanks your Email has been saved.See you later'), 'notif', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'home',"controller"=>"pages"));
			} else {
				//$this->Flash->error(__('The enews could not be saved. '), 'notif', array('class' => 'alert alert-danger'));
				$this->Session->setFlash(__('The enews could not be saved. Please, try again.'), 'notif', array('class' => 'alert alert-danger'));
				return $this->redirect(array('action' => 'home',"controller"=>"pages"));
				$this->Flash->error(__('The enews could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Enews->exists($id)) {
			throw new NotFoundException(__('Invalid enews'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Enews->save($this->request->data)) {
				//$this->Flash->success(__('The enews has been saved.'));
				$this->Session->setFlash(__('The enews has been saved.'), 'notif', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The enews could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Enews.' . $this->Enews->primaryKey => $id));
			$this->request->data = $this->Enews->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Enews->id = $id;
		if (!$this->Enews->exists()) {
			throw new NotFoundException(__('Invalid enews'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Enews->delete()) {
			$this->Flash->success(__('The enews has been deleted.'));
		} else {
			$this->Flash->error(__('The enews could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Enews->recursive = 0;
		$this->set('enews', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Enews->exists($id)) {
			throw new NotFoundException(__('Invalid enews'));
		}
		$options = array('conditions' => array('Enews.' . $this->Enews->primaryKey => $id));
		$this->set('enews', $this->Enews->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Enews->create();
			if ($this->Enews->save($this->request->data)) {
				$this->Flash->success(__('The enews has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The enews could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Enews->exists($id)) {
			throw new NotFoundException(__('Invalid enews'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Enews->save($this->request->data)) {
				$this->Flash->success(__('The enews has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The enews could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Enews.' . $this->Enews->primaryKey => $id));
			$this->request->data = $this->Enews->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Enews->id = $id;
		if (!$this->Enews->exists()) {
			throw new NotFoundException(__('Invalid enews'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Enews->delete()) {
			$this->Flash->success(__('The enews has been deleted.'));
		} else {
			$this->Flash->error(__('The enews could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
