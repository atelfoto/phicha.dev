<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */

class PagesController extends AppController {

		public $cacheAction = array(
		'home'=>'2 DAY');

public $helpers = array('GoogleMap');//a enlever une fois tester
/**
 * This controller does not use a model
 *
 * @var array
 */
	// public $uses = array();
public $uses= array('User','Comment','Carousel','Enews','Portfolio');


	public function home()	{
		$this->layout= 'home';

	}

	public function customers(){

	}

	public function admin_dashboard(){
		$this->layout='admin';
		$this->set('users_count', $this->User->find('count'));
		$this->set('Comment_count', $this->Comment->find('count'));
		$this->set('Carousel_count', $this->Carousel->find('count'));
		$this->set('Enews_count', $this->Enews->find('count'));
		if($this->request->is('post')){
			if (!empty($this->request->data['Page']['website'])) {
				$this->Session->setFlash(__("Your Mail us is reached."),'notif',array('class'=>"success",'type'=>'ok-sign'));
				$this->request->data = array();
			}else{
				if($this->Page->send($this->request->data['Page'] )){
					debug($this->request->data['Page'] );die();
					$this->Session->setFlash(__("Thank you.Your Mail Us is reached."),'notif',array('class'=>"success", 'type'=>'ok-sign'));
					$this->request->data = array();
				} else{
					$this->Session->setFlash(__("Thank you to correct your fields."),"notif",array('class'=>'danger', 'type'=>'info-sign'));
				}
			}
		}
	}


	function admin_index(){


	}
	public function map()
	{

	}
/**
 * [legalinformations description]
 * @return [type] [description]
 */
	public function legalinformations()
	{

	}
/**
 * [sitemap description]
 * @return [type] [description]
 */
	public function sitemap(){

	}

/**
 * [admin_clearcache Permet de vider le cache]
 * @return [type] [description]
 */
    function admin_clearcache(){
        Cache::clear();
        foreach(glob(CACHE.'*_cache') as $file){
        	unlink($file);
        }
        foreach(glob(CACHE.'views'.DS.'*.php') as $file){
        	unlink($file);
        }
        foreach(glob(CACHE.'models'.DS.'*') as $file){
        	unlink($file);
        }
        foreach(glob(CACHE.'persistent'.DS.'*') as $file){
        	unlink($file);
        }
        $this->Session->setFlash('Cache vidé avec succès','notif');
        $this->redirect($this->referer());
    }

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	// public function display() {
	// 	$path = func_get_args();

	// 	$count = count($path);
	// 	if (!$count) {
	// 		return $this->redirect('/');
	// 	}
	// 	$page = $subpage = $title_for_layout = null;

	// 	if (!empty($path[0])) {
	// 		$page = $path[0];
	// 	}
	// 	if (!empty($path[1])) {
	// 		$subpage = $path[1];
	// 	}
	// 	if (!empty($path[$count - 1])) {
	// 		$title_for_layout = Inflector::humanize($path[$count - 1]);
	// 	}
	// 	$this->set(compact('page', 'subpage', 'title_for_layout'));

	// 	try {
	// 		$this->render(implode('/', $path));
	// 	} catch (MissingViewException $e) {
	// 		if (Configure::read('debug')) {
	// 			throw $e;
	// 		}
	// 		throw new NotFoundException();
	// 	}
	// }



}
