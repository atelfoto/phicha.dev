<?php
App::uses('AppController', 'Controller');
/**
 * Portfolios Controller
 *
 * @property Portfolio $Portfolio
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class PortfoliosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

/**
 * admin_index method
 *
 * @return void
 */
	public function index() {
		$this->Portfolio->recursive = 0;
		$this->set('portfolios', $this->Paginator->paginate());
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Portfolio->recursive = 0;
		$this->set('portfolios', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Portfolio->exists($id)) {
			throw new NotFoundException(__('Invalid portfolio'));
		}
		$options = array('conditions' => array('Portfolio.' . $this->Portfolio->primaryKey => $id));
		$this->set('portfolio', $this->Portfolio->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Portfolio->create();
			if ($this->Portfolio->save($this->request->data)) {
				$this->Flash->success(__('The portfolio has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The portfolio could not be saved. Please, try again.'));
			}
		}
		$users = $this->Portfolio->User->find('list');
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
		if (!$this->Portfolio->exists($id)) {
			throw new NotFoundException(__('Invalid portfolio'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Portfolio->save($this->request->data)) {
				$this->Flash->success(__('The portfolio has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The portfolio could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Portfolio.' . $this->Portfolio->primaryKey => $id));
			$this->request->data = $this->Portfolio->find('first', $options);
		}
		$users = $this->Portfolio->User->find('list');
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
		$this->Portfolio->id = $id;
		if (!$this->Portfolio->exists()) {
			throw new NotFoundException(__('Invalid portfolio'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Portfolio->delete()) {
			$this->Flash->success(__('The portfolio has been deleted.'));
		} else {
			$this->Flash->error(__('The portfolio could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
