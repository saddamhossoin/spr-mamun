<?php
App::uses('AppModel', 'Model');
/**
 * PosPurchaseReturnDetail Model
 *
 * @property PosPurchaseReturn $PosPurchaseReturn
 * @property PosProduct $PosProduct
 * @property PosPurchaseDetail $PosPurchaseDetail
 */
class PosPurchaseReturnDetail extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'PosPurchaseReturn' => array(
			'className' => 'PosPurchaseReturn',
			'foreignKey' => 'pos_purchase_return_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PosProduct' => array(
			'className' => 'PosProduct',
			'foreignKey' => 'pos_product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PosPurchaseDetail' => array(
			'className' => 'PosPurchaseDetail',
			'foreignKey' => 'pos_purchase_detail_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
