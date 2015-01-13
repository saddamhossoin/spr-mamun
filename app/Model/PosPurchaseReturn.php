<?php
class PosPurchaseReturn extends AppModel {
	var $name = 'PosPurchaseReturn';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(  
		'PosPurchase' => array( 
			'className' => 'PosPurchase',
			'foreignKey' => 'pos_purchase_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
 		), 
		'PosSupplier' => array(
			'className' => 'PosSupplier',
			'foreignKey' => 'pos_supplier_id',
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
	
	var $hasMany = array(
		'PosPurchaseReturnDetail' => array(
			'className' => 'PosPurchaseReturnDetail',
			'foreignKey' => 'pos_purchase_return_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)	);
	
}
