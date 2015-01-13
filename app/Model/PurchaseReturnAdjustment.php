<?php
App::uses('AppModel', 'Model');
/**
 * PurchaseReturnAdjustment Model
 *
 * @property Purchase $Purchase
 * @property PurchaseReturn $PurchaseReturn
 */
class PurchaseReturnAdjustment extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'PosPurchase' => array(
			'className' => 'PosPurchase',
			'foreignKey' => 'purchase_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PosPurchaseReturn' => array(
			'className' => 'PosPurchaseReturn',
			'foreignKey' => 'purchase_return_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
