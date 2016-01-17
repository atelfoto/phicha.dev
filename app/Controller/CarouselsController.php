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
	public $components = array('Paginator','RequestHandler', 'Flash', 'Session');
/**
 * index method
 *
 * @return void
 */
public function index(){
		$pages = $this->Carousel->find('all'
			 ,array(
			 'conditions'=>array('type'=>'image/jpeg','online'=>1),
			 'fields'    =>array('name','photo','photo_dir','class','content')
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
	// public function admin_index() {
	// 	$this->Carousel->recursive = 0;
	// 	$this->set('carousels', $this->Paginator->paginate());
	// }
public function admin_index() {
	$actionHeading =__('carousel manager');
	$this->Carousel->recursive = 0;
	$this->paginate = array('Carousel'=>array(
		'limit'=>6,
		'order'=>array('Carousel.class' => 'desc'),
		));
	$d['carousels'] = $this->Paginate('Carousel',array(
		'online >= 0'));
	$this->set($d);
	$this->set(compact('actionHeading'));
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
		$carousel = $this->Carousel->read(null,$id);
		$this->Carousel->id = $id;
		if (!$this->Carousel->exists()) {
			throw new NotFoundException(__('Invalid carousel'));
		}
	if ($carousel['Carousel']['class']== 'active'){
		$this->Session->setFlash(__('You cannot delete an active image.Please select another image before.'), 'notif', array('class' => 'alert alert-danger'));
		return $this->redirect(array('action' => 'index'));
	}
		$this->request->allowMethod('post', 'delete');
		if ($this->Carousel->delete()) {
			$this->Session->setFlash(__('The carousel has been deleted.'), 'notif', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The carousel could not be deleted. Please, try again.'), 'notif', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
function admin_active($id=null) {
	$carousel = $this->Carousel->read(null,$id);
	//debug($carousel);die();

	if (!$id && empty($carousel)) {
		$this->Session->setFlash(__('You must provide a valid ID number to enable a post.',true),'notif',array('class'=>'danger','type'=>'sign'));
		$this->redirect(array('action'=>'index'));
	}
	if (!empty($carousel)) {
		$this->Carousel->updateAll(array('Carousel.class' => "' '"));
		$this->Carousel->saveField('class', "active",false);
		$this->Carousel->saveField('online', 1,false);
		if ($this->Carousel->save($this->Carousel->saveField('class',"active",false))) {
			$this->Session->setFlash(__('The Carousel %s has been published.',h($id)),'notif',array('class'=>'success','type'=>'ok'));
		} else {
			$this->Session->setFlash(__('The Carousel %s was not published.',h($id)),'notif',array('class'=>'danger','type'=>'sign'));
		}
		$this->redirect(array('action'=>'index'));
	} else {
		$this->Session->setFlash(__('No Carousel by that ID was found.',true),'notif',array('class'=>'danger','type'=>'sign'));
		$this->redirect(array('action'=>'index'));
	}
}
	function admin_enable($id=null) {
		$carousel = $this->Carousel->read(null,$id);
		if (!$id && empty($carousel)) {
			$this->Session->setFlash(__('You must provide a valid ID number to enable a post.',true),'notif',array('class'=>'danger','type'=>'sign'));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($carousel)) {
			$carousel['Carousel']['online'] = 1;
			if ($this->Carousel->save($this->Carousel->saveField('online', 1,false))) {
				$this->Session->setFlash(__('The Carousel %s has been published.',h($id)),'notif',array('class'=>'success','type'=>'ok'));

			} else {
				$this->Session->setFlash(__('The Carousel %s was not published.',h($id)),'notif',array('class'=>'danger','type'=>'sign'));
			}
			$this->redirect(array('action'=>'index'));
		} else {
			$this->Session->setFlash(__('No Carousel by that ID was found.',true),'notif',array('class'=>'danger','type'=>'sign'));
			$this->redirect(array('action'=>'index'));
		}
	}

	function admin_disable($id=null) {
		$carousel = $this->Carousel->read(null,$id);
		if (!$id && empty($carousel)) {
			$this->Session->setFlash(__('You must provide a valid ID number to disable a portfolio.',true),'notif',array('class'=>'danger','type'=>'sign'));
			$this->redirect(array('action'=>'index'));
		}
		if ($carousel['Carousel']['class']== 'active'){
			$this->Session->setFlash(__('you can not disable or delete an active image please select another image before'),
				'notif', array('class' => 'alert alert-danger'));
			return $this->redirect(array('action' => 'index'));
		}
		if (!empty($carousel)) {
			$carousel['Carousel']['online'] = 0;
			if ($this->Carousel->save($this->Carousel->saveField('online', 0,false))) {
				$this->Session->setFlash(__('Carousel ID %s has been disabled.',h($id)),'notif',array('class'=>'success','type'=>'ok'));
			} else {
				$this->Session->setFlash(__('portfolio ID %s was not disabled.',h($id)),'notif',array('class'=>'danger','type'=>'sign'));
			}

			$this->redirect(array('action'=>'index'));
		} else {
			$this->Session->setFlash(__('No Carousel by that ID was found.',true),'notif',array('class'=>'danger','type'=>'sign'));
			$this->redirect(array('action'=>'index'));
		}
	}
}
