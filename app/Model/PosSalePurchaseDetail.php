<?php
App::uses('AppModel', 'Model');
/**
 * PosSalePurchaseDetail Model
 *
 * @property PosPurchaseDetail $PosPurchaseDetail
 * @property PosSaleDetail $PosSaleDetail
 * @property PosProduct $PosProduct
 */
class PosSalePurchaseDetail extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'PosPurchaseDetail' => array(
			'className' => 'PosPurchaseDetail',
			'foreignKey' => 'pos_purchase_detail_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PosSaleDetail' => array(
			'className' => 'PosSaleDetail',
			'foreignKey' => 'pos_sale_detail_id',
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
		)
	);
}
