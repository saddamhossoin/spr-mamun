<?php
App::uses('AppModel', 'Model');
/**
 * ServiceDevice Model
 *
 * @property ServiceDeviceInfo $ServiceDeviceInfo
 */
class ServiceDevice extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 * 
 * @var array
 */
	public $hasMany = array(
		'ServiceDeviceInfo' => array(
			'className' => 'ServiceDeviceInfo',
			'foreignKey' => 'service_device_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		/*'ServiceService' => array(
			'className' => 'ServiceService',
			'foreignKey' => 'service_device_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)*/
	);
	public $belongsTo = array(
		'PosPcategory' => array(
			'className' => 'PosPcategory',
			'foreignKey' => 'pos_pcategory_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PosBrand' => array(
			'className' => 'PosBrand',
			'foreignKey' => 'pos_brand_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		) 
	);

}
