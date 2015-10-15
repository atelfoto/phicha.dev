<?php
App::uses('AppController', 'Controller');
/**
 * Comments Controller
 *
 * @property Comment $Comment
 * @property PaginatorComponent $Paginator
 * @property FlashComponent $Flash
 * @property SessionComponent $Session
 */
class CommentsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array(
		//'Paginator',
		'Flash', 'Session');
		// public $cacheAction = array(
		// 'index'=>'2 DAY'
		// );
/**
 * [$paginate description]
 * @var array
 */
	public $paginate = array(
		'limit' => 3,
		'order' => array('Comment.created' => 'desc'),
		//'paramType'=>'querystring'
		);

/**
 * index method
 *
 * @return void
 */
public function index() {
	$this->Comment->recursive = 0;
	if (!empty($this->request->data)) {
		$this->Comment->create($this->request->data);
		if ($this->Comment->validates()) {
			if (!empty($this->request->data['Comment']['website'])) {
				$this->Session->setFlash(__("Your Mail us is reached."),'notif',array('class'=>"success",'type'=>'ok-sign'));
				$this->request->data = array();
			}else{
				$token = md5(time(). ' - ' . uniqid());
				$this->Comment->create(array(
					'name'   => $this->request->data['Comment']['name'],
					'mail'   => $this->request->data['Comment']['mail'],
					'content'   => $this->request->data['Comment']['content'],
					'token'  => $token
					));
				$this->Comment->save();
				App::uses('CakeEmail','Network/Email');
					$CakeEmail = new CakeEmail('smtp'); // à changer par Default sur le site en ligne sinon smtp
					$CakeEmail->to(array('philippewagner2@sfr.fr'));
					$CakeEmail->from(array($this->request->data['Comment']["mail"]=>"livre d or"));
					$CakeEmail->subject(__("Commentaire sur le livre d'or"));
					$CakeEmail->viewVars(
						$this->request->data['Comment']+
						array(
							"name"=>$this->Comment->name,
							"mail"=>$this->Comment->mail,
							"content"=>$this->Comment->content,
							'token'=>$token,
							'id'=>$this->Comment->id
							));
					$CakeEmail->emailFormat('html');
					$CakeEmail->template('commentaire');
					$CakeEmail->send();
					$this->Session->setFlash(__('The comment has been saved.'),'notif',array('class'=>"success",'type'=>'ok-sign'));
					return $this->redirect(array('action' => 'index'));
				}
			}else {
				$this->Session->setFlash(__('The comment could not be saved. Please, try again.'),'notif',array('class'=>"danger",'type'=>'info-sign'));
			}
		}
		$this->paginate = array('Comment'=>array(
			'limit'=>3,
			'order'=>array(
				'Comment.created'=>'desc')
			));
		$d['comments']= $this->Paginate('Comment',array('Comment.online >= 1'));
		$this->set($d);
	}
/**
 * [activate description]
 * @param  [type] $comment_id [description]
 * @param  [type] $token      [description]
 * @return [type]             [description]
 */
public function activate($comment_id,$token){
	$comment = $this->Comment->find('first',array(
		'fields'     =>array('id'),
		'conditions' => array('id'=> $comment_id, 'token'=>$token)
		));
	if(empty($comment)){
		$this->Session->setFlash(__("This change link is not good"),'notif',array('class'=>'danger', "type"=>'info'));
		return $this->redirect('/');
	}
	$this->Session->setFlash(__("Your post has been validated"),'notif',array('class'=>'success', "type"=>'ok'));
	$this->Comment->save(array(
		'id'     => $comment['Comment']['id'],
		'online' => 1,
		'token'  => ''
		));
	foreach(glob(CACHE.'views'.DS.'*.php') as $file){
        				unlink($file);
        	   		 }
	return $this->redirect(array('controller'=>"comments",'action'=>'index'));
}

/**
 * add method
 *
 * @return void
 */
	// public function add() {
	// 	if ($this->request->is('post')) {
	// 		$this->Comment->create();
	// 		if ($this->Comment->save($this->request->data)) {
	// 			$this->Session->setFlash(__('The comment has been saved.'),'notif',array('class'=>"success",'type'=>'ok-sign'));
	// 			return $this->redirect(array('action' => 'index'));
	// 		} else {
	// 			$this->Session->setFlash(__('The comment could not be saved. Please, try again.'),'notif',array('class'=>"danger",'type'=>'info-sign'));
	// 		}
	// 	}
	// }
/**
 * admin_index method
 *
 * @return void
 */
	function admin_index(){
		$this->Comment->recursive = 0;
		$this->paginate = array('Comment'=>array(
			'limit'=>5,
			'order' => array(
            'Comment.created' => 'desc')
			));
		$d['comments'] = $this->Paginate('Comment',array(
			//'type'=>'post',
			'Comment.online >= 0',
			));
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
		if (!$this->Comment->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
		$options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
		$this->set('comment', $this->Comment->find('first', $options));
	}
/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Comment->create();
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash(__('The comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comment could not be saved. Please, try again.'));
			}
		}
		$users = $this->Comment->User->find('list');
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
		if (!$this->Comment->exists($id)) {
			throw new NotFoundException(__('Invalid comment'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash(__('The comment has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comment could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Comment.' . $this->Comment->primaryKey => $id));
			$this->request->data = $this->Comment->find('first', $options);
		}
		$users = $this->Comment->User->find('list');
		$this->set(compact('users'));
	}
/**
 * [admin_enable description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
	function admin_enable($id=null) {
		$comment = $this->Comment->read(null,$id);
		if (!$id && empty($comment)) {
			$this->Session->setFlash(__('You must provide a valid ID number to enable a post.',true),'notif',array('class'=>'danger','type'=>'sign'));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($comment)) {
			$comment['Comment']['online'] = 1;
			if ($this->Comment->save($comment)) {
				$this->Session->setFlash(__('Comment ID %s has been published.',h($id)),'notif',array('class'=>'success','type'=>'ok'));

			} else {
				$this->Session->setFlash(__('Comment ID %s was not published.',h($id)),'notif',array('class'=>'danger','type'=>'sign'));
			}
			$this->redirect(array('action'=>'index'));
		} else {
			$this->Session->setFlash(__('No Comment by that ID was found.',true),'notif',array('class'=>'danger','type'=>'sign'));
			$this->redirect(array('action'=>'index'));
		}
	}
/**
 * [admin_disable description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
	function admin_disable($id=null) {
		$comment = $this->Comment->read(null,$id);
		if (!$id && empty($comment)) {
			$this->Session->setFlash(__('You must provide a valid ID number to disable a comment.',true),'notif',array('class'=>'danger','type'=>'sign'));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($comment)) {
			$comment['Comment']['online'] = 0;
			if ($this->Comment->save($comment)) {

				$this->Session->setFlash(__('Comment ID %s has been disabled.',h($id)),'notif',array('class'=>'success','type'=>'ok'));
			} else {
				$this->Session->setFlash(__('comment ID %s was not disabled.',h($id)),'notif',array('class'=>'danger','type'=>'sign'));
			}

			$this->redirect(array('action'=>'index'));
		} else {
			$this->Session->setFlash(__('No Comment by that ID was found.',true),'notif',array('class'=>'danger','type'=>'sign'));
			$this->redirect(array('action'=>'index'));
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
		$this->Comment->id = $id;
		if (!$this->Comment->exists()) {
			throw new NotFoundException(__('Invalid comment'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Comment->delete()) {
			$this->Session->setFlash(__('The comment has been deleted.'));
		} else {
			$this->Session->setFlash(__('The comment could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
