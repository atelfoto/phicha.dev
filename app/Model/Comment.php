<?php
App::uses('AppModel', 'Model');
/**
 * Comment Model
 *
 * @property User $User
 * @property Post $Post
 */
class Comment extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

/**
 * Validation rules
 *
 * @var array
 */
public $validate = array(
	'name' => array(
		'notBlank' => array(
			'rule' => array('notBlank'),
			'message' => 'you must enter your name',
			),
		'lengthBetween' => array(
			'rule' => array('lengthBetween',5,25),
			'message' => 'Between 5 to 15 characters',
			),
		),
	'mail' => array(
		'email' => array(
			'rule' => array('email'),
			),
		),
	'content' => array(
		'notBlank' => array(
			'rule' => array('notBlank'),
			'message' => 'Your custom message here',
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	// public $belongsTo = array(
	// 	'User' => array(
	// 		'className' => 'User',
	// 		'foreignKey' => 'user_id',
	// 		'conditions' => '',
	// 		'fields' => '',
	// 		'order' => ''
	// 	),
	// 	'Meta' => array(
	// 		'className' => 'Meta',
	// 		'foreignKey' => 'meta_id',
	// 		'conditions' => '',
	// 		'fields' => '',
	// 		'order' => ''
	// 	)
	// );
}
