<?php
App::uses('AppModel', 'Model');
/**
 * ServiceDeviceDefect Model
 *
 * @property ServiceDeviceInfo $ServiceDeviceInfo
 * @property ServiceDefect $ServiceDefect
 */
class ServiceDeviceDefect extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ServiceDeviceInfo' => array(
			'className' => 'ServiceDeviceInfo',
			'foreignKey' => 'service_device_info_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ServiceDefect' => array(
			'className' => 'ServiceDefect',
			'foreignKey' => 'service_defect_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
