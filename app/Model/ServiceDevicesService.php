<?php
App::uses('AppModel', 'Model');
/**
 * ServiceDevicesService Model
 *
 * @property ServiceService $ServiceService
 * @property ServiceDevice $ServiceDevice
 */
class ServiceDevicesService extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
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
