<?php
App::uses('AppController', 'Controller');
/**
 * Portfolios Controller
 *
 * @property Portfolio $Portfolio
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class PortfoliosController extends AppController {
/**
 * Components
 *
 * @var
 */
public $components = array('Paginator', 'Flash', 'Session');
	public $cacheAction = array(
		'index'=>'2 DAY',
		'view'=>'2 DAY');

	public function menu(){
		$portfolios = $this->Portfolio->find('all',array(
			'conditions'=>array('online'=>1),
			'fields'    =>array('slug','name')
			));
		return $portfolios;
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Portfolio->recursive = 0;
		$this->paginate = array('Portfolio'=>array(
			'limit'=>6,
			));
		$this->set('portfolios',$this->paginate('Portfolio',array('online >=1')));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */

	public function view($slug) {
	    if(empty($slug)) {
	        throw new NotFoundException();
	    }
	    $portfolio = $this->Portfolio->find('first', array(
	        'conditions' => array('Portfolio.slug' => $slug),
	    ));
	    if(!$portfolio){
	        throw new NotFoundException();
	    }
	    $this->set(compact('portfolio'));
	}

/**
 * admin_index method
 *
 * @return void
 */

	public	function admin_index(){
		$this->Portfolio->recursive = 0;
		$this->paginate = array('Portfolio'=>array(
			'limit'=>5,
					'order'=>array(
						'Portfolio.created'=>'desc'),
			));
		$d['portfolios'] = $this->Paginate('Portfolio',array(
			//'type'=>'gallerie',
			'online >= 0'));
		$this->set($d);
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
				$name= Inflector::slug($this->request->data['Portfolio']['name'],'-');
				$dir = WWW_ROOT .'files'.DS.'portfolio'.DS.$name;
        if(!file_exists($dir))
            mkdir($dir, 0777);
				$this->Session->setFlash(__('The portfolio has been saved.'), 'notif', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The portfolio could not be saved. Please, try again.'), 'notif', array('class' => 'alert alert-danger'));
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
				$this->Session->setFlash(__('The portfolio has been saved.'), 'notif', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The portfolio could not be saved. Please, try again.'), 'notif', array('class' => 'alert alert-danger'));
			}
		} else {
			$options = array('conditions' => array('Portfolio.' . $this->Portfolio->primaryKey => $id));
			$this->request->data = $this->Portfolio->find('first', $options);
		}
	//	$users = $this->Portfolio->User->find('list');
	//	$this->set(compact('users'));
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
		$this->request->onlyAllow('post', 'delete');
		if ($this->Portfolio->delete()) {
        	 foreach(glob(CACHE.'models'.DS.'myapp_cake_model_default_chateauccxbdchaz_portfolios') as $file){
        				unlink($file);
        	   		 }
			$this->Session->setFlash(__('The portfolio has been deleted.'), 'notif', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The portfolio could not be deleted. Please, try again.'), 'notif', array('class' => 'alert alert-danger'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	function admin_enable($id=null) {
		$portfolio = $this->Portfolio->read(null,$id);
		if (!$id && empty($portfolio)) {
			$this->Session->setFlash(__('You must provide a valid ID number to enable a post.',true),'notif',array('class'=>'danger','type'=>'sign'));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($portfolio)) {
			$portfolio['Portfolio']['online'] = 1;
			if ($this->Portfolio->save($portfolio)) {
				$this->Session->setFlash(__('Portfolio ID %s has been published.',h($id)),'notif',array('class'=>'success','type'=>'ok'));

			} else {
				$this->Session->setFlash(__('Portfolio ID %s was not published.',h($id)),'notif',array('class'=>'danger','type'=>'sign'));
			}
			$this->redirect(array('action'=>'index'));
		} else {
			$this->Session->setFlash(__('No Portfolio by that ID was found.',true),'notif',array('class'=>'danger','type'=>'sign'));
			$this->redirect(array('action'=>'index'));
		}
	}

	function admin_disable($id=null) {
		$portfolio = $this->Portfolio->read(null,$id);

		if (!$id && empty($portfolio)) {
			$this->Session->setFlash(__('You must provide a valid ID number to disable a portfolio.',true),'notif',array('class'=>'danger','type'=>'sign'));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($portfolio)) {
			$portfolio['Portfolio']['online'] = 0;
			if ($this->Portfolio->save($portfolio)) {

				$this->Session->setFlash(__('Portfolio ID %s has been disabled.',h($id)),'notif',array('class'=>'success','type'=>'ok'));
			} else {
				$this->Session->setFlash(__('portfolio ID %s was not disabled.',h($id)),'notif',array('class'=>'danger','type'=>'sign'));
			}

			$this->redirect(array('action'=>'index'));
		} else {
			$this->Session->setFlash(__('No Portfolio by that ID was found.',true),'notif',array('class'=>'danger','type'=>'sign'));
			$this->redirect(array('action'=>'index'));
		}
	}
}
