<?php
App::uses('AppModel', 'Model');
/**
 * Enews Model
 *
 */
class Enews extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'mail';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'mail' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'vous devez insérer un émail valide',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			"unique"=>array(
				'rule'=> 'isUnique',
				'message'=> 'This username is already used'
				)

		),
	);
}
