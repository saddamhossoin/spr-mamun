<?php
App::uses('AppModel', 'Model');
/**
 * ServiceDeviceInfo Model
 *
 * @property User $User
 * @property ServiceDevice $ServiceDevice
 */
class ServiceDeviceInfo extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

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
		),
		
		'ServiceDevice' => array(
			'className' => 'ServiceDevice',
			'foreignKey' => 'service_device_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

  
		 
	public $hasOne = array(
 		'ServiceInvoice' => array(
			'className' => 'ServiceInvoice',
			'foreignKey' => 'service_device_info_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Assesment' => array(
			'className' => 'Assesment',
			'foreignKey' => 'service_device_info_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => ''
		) 
		);
			
		
		public $hasMany = array(
			'ServiceDeviceAcessory' => array(
				'className' => 'ServiceDeviceAcessory',
				'foreignKey' => 'service_device_info_id',
				'conditions' => '',
				'fields' => '',
				'order' => ''
				),
				'ServiceDeviceDefect' => array(
				'className' => 'ServiceDeviceDefect',
				'foreignKey' => 'service_device_info_id',
				'conditions' => '',
				'fields' => '',
				'order' => ''
				),
 		);
		
		 
	
}
