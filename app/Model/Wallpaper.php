<?php
App::uses('AppModel', 'Model');
/**
 * Portfolio Model
 *
 * @property User $User
 */
class Wallpaper extends AppModel {
 public $components = array('Session',"RequestHandler");
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	// Les associations ci-dessous ont été créés avec toutes les clés possibles, ceux qui ne sont pas nécessaires peuvent être enlevés

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * [$actsAs description]
 * @var array
 */
	public $actsAs = array(
			'Upload.Upload' => array(
			'photo' => array(
					'fields' => array(
						'dir' => 'photo_dir'
					),
					'thumbnailMethod' => 'php',
					'thumbnailSizes' => array(
						"desk"=>"1200x815",
						"tablet"=>"992x672",
						"mobile"=>"720x488",
						'thumb' => '150x150'
					),
					'deleteOnUpdate' => true,
					'deleteFolderOnDelete' => true
				)
			),
			'Sluggable.Sluggable' => array(
	        'field'     => 'name',  // Field that will be slugged
	        'slug'      => 'slug',  // Field that will be used for the slug
	        'lowercase' => true,    // Do we lowercase the slug ?
	        'separator' => '-',     //
	        'overwrite' => false    // Does the slug is auto generated when field is saved no matter what
		)
		);



/**
 * Validation rules  notBlank
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Name is required',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'unique'=>array(
				'rule'=>'isUnique',
				"message"=>' This name has already been chosen.'
			)
		),
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'photo' => array(
			'uploadError' => array(
				'rule' => 'uploadError',
				'message' => ' Something is wrong, try again',
				'on' => 'create'
			),
	    	'isUnderPhpSizeLimit' => array(
	    		'rule' => 'isUnderPhpSizeLimit',
	        	'message' => 'File exceeds the size limit upload file'
	        ),
		     'isValidMimeType' => array(
	    	 	'rule' => array('isValidMimeType', array('image/jpeg', 'image/png'), false),
         	'message' => 'The picture is not jpg or png',
	    	 ),
		     // 'isBelowMaxSize' => array(
	    	 // 	'rule' => array('isBelowMaxSize', 1048576),
       //  	'message' => 'The image size is too large'
	    	 // ),
		     'isValidExtension' => array(
	    	 	'rule' => array('isValidExtension', array('jpg', 'png','jpeg'), false),
    		   	'message' => 'The image does not have the extension jpg or png'
	    	 ),
			 'checkUniqueName' => array(
   		    	 'rule' => array('checkUniqueName'),
   		    	 'message' => 'The image is already registered',
   		    	 'on' => 'update'
      		),
        ),
	);
/**
 * [checkUniqueName: Donne un nom unique à la photo avec le plugin upload]
 * @param  [type] $data [description]
 * @return [type]       [description]
 */
	function checkUniqueName($data)	{
	    $isUnique = $this->find('first', array('fields' => array('Wallpaper.photo'), 'conditions' => array('Wallpaper.photo' => $data['photo'])));

	    if(!empty($isUnique)) {
	        return false;
	    }
	    else {
	        return true;
	    }
	}
 }
