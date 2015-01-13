<?php
App::uses('AppModel', 'Model');
/**
 * ServiceDeviceAcessory Model
 *
 * @property ServiceDeviceInfo $ServiceDeviceInfo
 * @property ServiceAcessory $ServiceAcessory
 */
class ServiceDeviceAcessory extends AppModel {


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
		'ServiceAcessory' => array(
			'className' => 'ServiceAcessory',
			'foreignKey' => 'service_acessory_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
