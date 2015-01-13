<?php
App::uses('AppModel', 'Model');
/**
 * AssesmentInventory Model
 *
 * @property PosProduct $PosProduct
 * @property Assesment $Assesment
 */
class AssesmentInventory extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'PosProduct' => array(
			'className' => 'PosProduct',
			'foreignKey' => 'pos_product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Assesment' => array(
			'className' => 'Assesment',
			'foreignKey' => 'assesment_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
