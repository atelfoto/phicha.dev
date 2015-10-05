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
class WallpapersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Flash', 'Session');

	public function index()	{
		$this->layout= 'home';
		$pages = $this->Wallpaper->find('all'
			// ,array(
			// 'conditions'=>array('type'=>'image/jpeg','online'=>1),
			// 'fields'    =>array('name','photo','photo_dir','class')
			// )
			);
		return $pages;

	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Wallpaper->recursive = 0;
		$this->set('wallpapers', $this->Paginator->paginate());
	}



/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Wallpaper->create();
			if ($this->Wallpaper->save($this->request->data)) {
				$this->Session->setFlash(__('The picture has been saved.'), 'notif', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The picture could not be saved. Please, try again.'), 'notif', array('class' => 'alert alert-danger'));
			}
		}
		$users = $this->Wallpaper->User->find('list');
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
		if (!$this->Wallpaper->exists($id)) {
			throw new NotFoundException(__('Invalid carousel'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Wallpaper->save($this->request->data)) {
				$this->Session->setFlash(__('The picture has been saved.'), 'notif', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The picture could not be saved. Please, try again.'), 'notif', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Wallpaper.' . $this->Wallpaper->primaryKey => $id));
			$this->request->data = $this->Wallpaper->find('first', $options);
		}
		$users = $this->Wallpaper->User->find('list');
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
		$this->Wallpaper->id = $id;
		if (!$this->Wallpaper->exists()) {
			throw new NotFoundException(__('Invalid picture'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Wallpaper->delete()) {
			$this->Session->setFlash(__('The picture has been deleted.'), 'notif', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The picture could not be deleted. Please, try again.'), 'notif', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
