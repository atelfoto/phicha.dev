<?php
App::uses('AppModel', 'Model');
class Page extends AppModel{
public $useTable =false;
	// function afterFind($results, $primary = false){
	// 	foreach($results as $k => $result){
	// 		if(isset($result[$this->alias]['slug'])){
	// 			$results[$k][$this->alias]['url'] = '/' . $result[$this->alias]['slug'];
	// 		}
	// 	}
	// 	return $results;
	// }
 public $validate = array(
 	 	'email' => array(
		 	'rule' => 'email',
		 	'required' => true,
		 	'message' => 'You must enter a valid email address'
		 	),
		 'message' => array(
		 	'rule' => 'notBlank',
		 	'required' => true,
		 	'message' => 'You must enter your message'
		 	),
		 'subject' => array(
		 	'rule' => 'notBlank',
		 	'required' => true,
		 	'message' => 'You must enter your subject'
		 	)
 	 	);
	public function send($d){
 		$this->set($d);
 		if ($this->validates()) {
 		 	App::uses('CakeEmail','Network/Email');
 		 	//$mail = new CakeEmail();//en ligne
 		 	$mail = new CakeEmail("smtp"); // smtp en local sinon default en ligne
 			$mail->to($d['email'])
 				 ->from('philippewagner2@sfr.fr')
 			 	 ->subject($d['subject'])
 			 	 ->emailFormat('html')
 			 	 ->template('rapidmail')->viewVars($d);
 			return $mail->send();
 		}else{
 			return false;
 		}
 	}

}
