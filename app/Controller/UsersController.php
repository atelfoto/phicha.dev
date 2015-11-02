<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController{

	public $displayField = array('username');

public $components = array('Flash');
/**
 * signup
 */
public function signup(){
	if (!empty($this->request->data)) {
		$this->User->create($this->request->data);
		if($this->User->validates()){
			$token = md5(time(). ' - ' . uniqid());
			$this->User->create(array(
				'username'=> $this->request->data['User']['username'],
				'password'=> $this->Auth->password($this->request->data['User']['password']),
				'mail'   => $this->request->data['User']['mail'],
				'lastlogin'=> $this->request->data ['User']['lastlogin'] = '2010-01-01 12:00:00',
				'token'  => $token
				));
			$this->User->save();
			App::uses('CakeEmail','Network/Email');
					$CakeEmail = new CakeEmail('smtp'); // à changer par Default sur le site en ligne sinon smtp
					$CakeEmail->to($this->request->data['User']["mail"]);
					$CakeEmail->subject(__(' your registration to our site'));
					$CakeEmail->viewVars(
						$this->request->data['User']+
						array(
							'token'=>$token,
							'id'=>$this->User->id
							)
						);
					$CakeEmail->emailFormat('html');
					$CakeEmail->template('signup');
					$CakeEmail->send();
					$this->Session->setFlash(__("Thank you you are registered mail sent to you to confirm your compte.Veuillez check your spam in case."),
						'notif',array('class'=>'success','type'=>'ok-sign'));
				}else{
				$this->Session->setFlash(__("Thank you to correct your mistakes"), 'notif', array('class'=>'danger','type'=>'info'));
			}
		}
	}
/**
 * [admin_signup description]
 * @return [type] [description]
 */
	public function admin_signup(){
			if (!empty($this->request->data)) {
				$this->User->create($this->request->data);
				if($this->User->validates()){
					$token = md5(time(). ' - ' . uniqid());
					$this->User->create(array(
						'username'=> $this->request->data['User']['username'],
						'password'=> $this->Auth->password($this->request->data['User']['password']),
						'mail'   => $this->request->data['User']['mail'],
						'lastlogin'=> $this->request->data ['User']['lastlogin'] = '2010-01-01 12:00:00',
						'token'  => $token
						));
					$this->User->save();
					App::uses('CakeEmail','Network/Email');
					$CakeEmail = new CakeEmail('smtp'); // à changer par Default sur le site en ligne sinon smtp en local
					$CakeEmail->to($this->request->data['User']["mail"]);
					$CakeEmail->subject(__(' your registration to our site'));
					$CakeEmail->viewVars(
						$this->request->data['User']+
						array(
							'token'=>$token,
							'id'=>$this->User->id
							)
						);
					$CakeEmail->emailFormat('html');
					$CakeEmail->template('admin_signup');
					$CakeEmail->send();
					$this->Session->setFlash(
						__("Thank you you are registered mail sent to you to confirm your compte.Please check your spam in case."),
						'notif',array('class'=>'success','type'=>'ok-sign'));
					return $this->redirect(array('action'=>'index'));
				}else{
					$this->Session->setFlash(__("Thank you to correct your mistakes"), 'notif', array('class'=>'danger','type'=>'info'));
				}
			}
		}
	/**
	* permet de refaire un mot de passe oublié
	* @return [type] [description]
	**/
	public function forgot (){
		$this->layout = "home";
		if(!empty($this->request->data)){
			$user = $this->User->findByMail($this->request->data['User']['mail'],array('id'));
			if(empty($user)){
				$this->Session->setFlash(__("This email address is not associated with any account"),'notif',array('class'=>"danger",'type'=>'info'));
			}else{
				$token = md5(uniqid().time());
				$this->User->id = $user['User']['id'];
				$this->User->saveField('token', $token);
				App::uses('CakeEmail', 'Network/Email');
				$cakeMail = new CakeEmail('smtp');// à changer par default sur le site en ligne ou smtp en local
				$cakeMail->to($this->request->data['User']['mail']);
				$cakeMail->from(array('philippewagner2@sfr.fr'=>"site "));
				$cakeMail->subject(__('Password regeneration'));
				$cakeMail->template('forgot');
				$cakeMail->viewVars(array('token' =>$token,'id'=>$user['User']['id']));
				$cakeMail->emailFormat('text');
				$cakeMail->send();
				$this->Session->setFlash(__("An email was sent to you with instructions to regenerate your password! Please check your span !!"), "notif", array(
					'class'=>'info','type'=>'info'));
			}
		}
	}
/**
 *permet de refaire un mot de passe
 *
 */
public function password($user_id,$token){
	$user = $this->User->find('first',array(
		'fields'     =>array('id'),
		'conditions' => array('id'=> $user_id, 'token'=>$token)
		));
	if(empty($user)){
		$this->Session->setFlash(__("This link does not look good"),'notif',array('class'=>'danger','type'=>'info'));
		return $this->redirect(array('action'=>'forgot'));
	}
	if(!empty($this->request->data)){
		$this->User->create($this->request->data);
		if ($this->User->validates()){
			$this->User->create();
			$this->User->save(array(
				'id'=>$user['User']['id'],
				'token'=>'',
				'active'=> 1,
				'password'=> $this->Auth->password($this->request->data['User']['password'])
				));
			$this->Session->setFlash(__("your password has been changed"), 'notif', array('class'=>'success',"type"=>"ok"));
			return $this->redirect(array('action'=>'login'));
		}
	}
}
/**
 * activate
 */
public function activate($user_id,$token){
	$user = $this->User->find('first',array(
		'fields'     =>array('id'),
		'conditions' => array('id'=> $user_id, 'token'=>$token)
		));
	if(empty($user)){
		$this->Session->setFlash(__("This change link is not good"),'notif',array('class'=>'danger', "type"=>'info'));
		return $this->redirect('/');
	}
	$this->Session->setFlash(__("Your account has been validated"),'notif',array('class'=>'success', "type"=>'ok'));
	$this->User->save(array(
		'id'     => $user['User']['id'],
		'active' => 1,
		'token'  => ''
		));
	return $this->redirect(array('action'=>'login'));
}
	/**
	 * account
	 */
	public function admin_account(){
		if (!empty($this->request->data)) {
			$this->request->data['User']['id'] = $this->Auth->user('id');
			$this->User->create($this->request->data);
			if($this->User->validates('isJpg')){
				$this->User->create();
				$this->User->save($this->request->data, true, array('firstname','lastname','name','mail'));
				if(!empty($this->request->data['User']['avatarf']['tmp_name'])) {
					$directory = IMAGES. 'avatars' . DS . ceil($this->User->id/1000);
					if(!file_exists($directory))
						mkdir($directory, 0777);
					move_uploaded_file($this->request->data['User']['avatarf']['tmp_name'], $directory . DS . $this->User->id . '.jpg');
					$this->User->saveField('avatar', 1);
				}
				$user = $this->User->read();
				$this->Auth->login($user['User']);

				$this->Session->setFlash(__("Your information has been changed"), "notif", array('class'=>"success", "type"=>'ok'));
			}else{
				$errors = $this->User->invalidFields();
				$this->Session->setFlash(__("Your information could not be validated"), "notif", array('class'=>"danger", "type"=>'info'));
			}
		}else{
			$this->User->id= $this->Auth->user('id');
			$this->request->data = $this->User->read();
		}
	}
/**
 * member account
 */
public function member_account(){
	if (!empty($this->request->data)) {
		$this->request->data['User']['id'] = $this->Auth->user('id');
		$this->User->create($this->request->data);
		if($this->User->validates('isJpg')){
			$this->User->create();
			$this->User->save($this->request->data, true, array('firstname','lastname','name','mail'));
			if(!empty($this->request->data['User']['avatarf']['tmp_name'])) {
				$directory = IMAGES. 'avatars' . DS . ceil($this->User->id/1000);
				if(!file_exists($directory))
					mkdir($directory, 0777);
				move_uploaded_file($this->request->data['User']['avatarf']['tmp_name'], $directory . DS . $this->User->id . '.jpg');
				$this->User->saveField('avatar', 1);
			}
			$user = $this->User->read();
			$this->Auth->login($user['User']);
			$this->Session->setFlash(__("Your information has been changed"), "notif", array('class'=>"success", "type"=>'ok'));
		}else{
			$errors = $this->User->invalidFields();
			$this->Session->setFlash(__("Your information could not be validated"), "notif", array('class'=>"danger", "type"=>'info'));
		}
	}else{
		$this->User->id= $this->Auth->user('id');
		$this->request->data = $this->User->read();
	}
}

	/**
	* login
	**/
	function login(){
		$this->layout ="home";
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->request->prefix;
				if ( $this->request->data['User']['remember'] == 1) {
					$cookie = array();
					$cookie['username'] = $this->request->data['User']['username'];
					$cookie['password'] = $this->Auth->password($this->request->data['User']['password']);
					# Write cookie ( 30 Days )
					$cookieTime = "1 days";
					$this->Cookie->time = "1 days";
					$this->Cookie->name = "remenber";
					$this->Cookie->write('Auth.User.id', $cookie, false,"1 days");
					$session = $this->Session->read();
					$this->Cookie->write('Auth.Username', $cookieTime);
				}
				$this->User->id =  $this->Auth->user("id");
				$this->User->saveField('lastlogin',date('Y-m-d H:i:s'));
				$this->Session->setFlash( __("Hello You are logged nows"), "notif",array('class'=>'success' ,'type'=>'ok'));
				if ($this->Session->read('Auth.User.role')== "admin") {
					return $this->redirect($this->Auth->redirect(array('controller' => 'admin/users', 'action' => 'account',array('admin'=>true))));
				}
				if ($this->Session->read('Auth.User.role')== "member") {
					return $this->redirect($this->Auth->redirect(array('controller' => 'member/users', 'action' => 'account',array('member'=>true))));
				}

			}else{
				$this->Session->setFlash( __("Your login or your password are not correct"),'notif',array('class'=>'danger', 'type'=>"info"));
			}
		}
	}
/**
 * [logout description]
 * @return [type] [description]
 */
	public function logout(){
		$this->Auth->logout();
		$this->Cookie->delete('remember');
		$this->Flash->success(__('You are now offline'));
		//$this->Session->setFlash(__("You are now offline"), "notif",array('class'=>'success','type'=>'ok'));
		//$this->Session->setFlash(__("You are now offline"));
		$this->redirect('/');
	}

/**
 * [logout description]
 * @return [type] [description]
 */
	public function admin_logout(){
		$this->Auth->logout();
		$this->Cookie->delete('remember');
		$this->Session->setFlash(__("You are now offline"), "notif",array('class'=>'success','type'=>'ok'));
		$this->redirect('/');
	}

	function user_profil(){
		$this->layout= 'member';
		return true;
	}

/**
 * [admin_index description]
 * @return [type] [description]
 */
function admin_index(){
	$d['users']= $this->Paginate('User');
	$this->set($d);
}

function member_index(){
	$this->layout= 'member';
	$d['users']= $this->Paginate('User');
	$this->set($d);
}

public function admin_edit($id=null){
	if ($this->request->is(array('post', 'put'))) {
		$d =$this->request->data;
		if($this->User->save($d,true,array('username','role','active'))){
			$this->Session->setFlash(__("The user has been added"), "notif",array('class'=>'success','type'=>'ok'));
			return $this->redirect(array('action' => 'index'));
		}else {
			$this->Session->setFlash(__('The users could not be saved. Please, try again.'), "notif",array('class'=>'danger','type'=>'sign'));
		}
	}elseif($id){
		$this->User->id = $id;
		$this->request->data = $this->User->read('username,role,id,active,password');
	}
	$d= array();
	$d['roles'] = array(
		'admin' => 'admin',
		'member'  => 'membre'
		);
	$this->set($d);
}

/**
 * [admin_enable description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
function admin_enable($id=null) {
	$user = $this->User->read(null,$id);
	if (!$id && empty($user)) {
		$this->Session->setFlash(__('You must provide a valid ID number to enable a user.',true),'notif',array('class'=>'danger','type'=>'sign'));
		$this->redirect(array('action'=>'index'));
	}
	if (!empty($user)) {
		$user['User']['active'] = 1;
		if ($this->User->save($user)) {
			$this->Session->setFlash(__('User ID %s has been published.',h($id)),'notif');
		} else {
			$this->Session->setFlash(__('User ID %s was not saved.',h($id)),'notif',array('class'=>'danger','type'=>'sign'));
		}
		$this->redirect(array('action'=>'index'));
	} else {
		$this->Session->setFlash(__('No user by that ID was found.',true),'notif',array('class'=>'danger','type'=>'sign'));
		$this->redirect(array('action'=>'index'));
	}
}
/**
 * [admin_disable description]
 * @param  [type] $id [description]
 * @return [type]     [description]
 */
function admin_disable($id=null) {
	$user = $this->User->read(null,$id);
	if (!$id && empty($user)) {
		$this->Session->setFlash(__('You must provide a valid ID number to disable a user.',true),'notif',array('class'=>'danger','type'=>'sign'));
		$this->redirect(array('action'=>'index'));
	}
	if (!empty($user)) {
		$user['User']['active'] = 0;
		if ($this->User->save($user)) {
			$this->Session->setFlash(__('User ID %s has been disabled.', h($id)),'notif');
		} else {
			$this->Session->setFlash(__('User ID %s was not saved.',h($id)),'notif',array('class'=>'danger','type'=>'sign'));
		}
		$this->redirect(array('action'=>'index'));
	} else {
		$this->Session->setFlash(__('No User by that ID was found.',true),'notif',array('class'=>'danger','type'=>'sign'));
		$this->redirect(array('action'=>'index'));
	}
}

/**
 * delete
 */
public function admin_delete($id) {
	if (!$this->request->is('post')) {
		throw new MethodNotAllowedException();
	}
	if ($this->User->delete($id)) {
		$this->Session->setFlash(__('User removed: %s', $id),'notif',array('class'=>'success','type','ok'));
		return $this->redirect(array('action' => 'index'));
	}
	$this->Session->setFlash(__('Could not remove product'),'notif',array('class'=>'danger','type','sign'));
	return $this->redirect($this->referer());
}

}
