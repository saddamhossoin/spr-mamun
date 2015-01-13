<?php
App::uses('AppModel', 'Model');
/**
 * AssesmentService Model
 *
 * @property Assesment $Assesment
 * @property ServiceService $ServiceService
 */
class AssesmentService extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Assesment' => array(
			'className' => 'Assesment',
			'foreignKey' => 'assesment_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ServiceService' => array(
			'className' => 'ServiceService',
			'foreignKey' => 'service_service_id',
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
}
