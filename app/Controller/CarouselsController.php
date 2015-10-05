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
class CarouselsController extends AppController {

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
public function index(){
		$pages = $this->Carousel->find('all'
			 ,array(
			 'conditions'=>array('type'=>'image/jpeg','online'=>1),
			 'fields'    =>array('name','photo','photo_dir','class')
			 )
			);
		return $pages;
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Carousel->exists($id)) {
			throw new NotFoundException(__('Invalid carousel'));
		}
		$options = array('conditions' => array('Carousel.' . $this->Carousel->primaryKey => $id));
		$this->set('carousel', $this->Carousel->find('first', $options));
	}






/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Carousel->recursive = 0;
		$this->set('carousels', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Carousel->exists($id)) {
			throw new NotFoundException(__('Invalid carousel'));
		}
		$options = array('conditions' => array('Carousel.' . $this->Carousel->primaryKey => $id));
		$this->set('carousel', $this->Carousel->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Carousel->create();
			if ($this->Carousel->save($this->request->data)) {
				$this->Session->setFlash(__('The carousel has been saved.'), 'notif', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The carousel could not be saved. Please, try again.'), 'notif', array('class' => 'alert alert-danger'));
			}
		}
		$users = $this->Carousel->User->find('list');
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
		if (!$this->Carousel->exists($id)) {
			throw new NotFoundException(__('Invalid carousel'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Carousel->save($this->request->data)) {
				Cache::clear();
				foreach(glob(CACHE.'models'.DS.'*') as $file){
        	unlink($file);
        }
        foreach(glob(CACHE.'views'.DS.'*.php') as $file){
        	unlink($file);
        }

				$this->Session->setFlash(__('The carousel has been saved.'), 'notif', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The carousel could not be saved. Please, try again.'), 'notif', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Carousel.' . $this->Carousel->primaryKey => $id));
			$this->request->data = $this->Carousel->find('first', $options);
		}
		$users = $this->Carousel->User->find('list');
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
		$this->Carousel->id = $id;
		if (!$this->Carousel->exists()) {
			throw new NotFoundException(__('Invalid carousel'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Carousel->delete()) {
			$this->Session->setFlash(__('The carousel has been deleted.'), 'notif', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The carousel could not be deleted. Please, try again.'), 'notif', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
