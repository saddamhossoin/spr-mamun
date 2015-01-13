<?php
App::uses('AppModel', 'Model');
/**
 * Barcode Model
 *
 * @property PosProduct $PosProduct
 */
class PosBarcode extends AppModel {


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
		)
	);
}
