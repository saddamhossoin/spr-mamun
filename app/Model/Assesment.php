<?php
App::uses('AppModel', 'Model');
/**
 * Assesment Model
 *
 * @property AssesmentInventory $AssesmentInventory
 * @property AssesmentService $AssesmentService
 */
class Assesment extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
 public $belongsTo = array(
 		'ServiceDeviceInfo' => array(
			'className' => 'ServiceDeviceInfo',
			'foreignKey' => 'service_device_info_id',
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
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'tech_id',
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
	);
		
	public $hasMany = array(
		'AssesmentInventory' => array(
			'className' => 'AssesmentInventory',
			'foreignKey' => 'assesment_id',
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
		'AssesmentService' => array(
			'className' => 'AssesmentService',
			'foreignKey' => 'assesment_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
