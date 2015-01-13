<?php
App::uses('AppModel', 'Model');
/**
 * PosSaleReturnDetail Model
 *
 * @property PosSaleReturn $PosSaleReturn
 * @property PosProduct $PosProduct
 * @property PosSaleDetail $PosSaleDetail
 */
class PosSaleReturnDetail extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'PosSaleReturn' => array(
			'className' => 'PosSaleReturn',
			'foreignKey' => 'pos_sale_return_id',
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
		'PosSaleDetail' => array(
			'className' => 'PosSaleDetail',
			'foreignKey' => 'pos_sale_detail_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
