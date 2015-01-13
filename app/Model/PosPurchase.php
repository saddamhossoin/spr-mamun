<?php
class PosPurchase extends AppModel {
	var $name = 'PosPurchase';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array( 
		'PosSupplier' => array(
			'className' => 'PosSupplier',
			'foreignKey' => 'pos_supplier_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		/*'PosQuote' => array(
			'className' => 'PosQuote',
			'foreignKey' => 'pos_quote_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),*/
 	);
 
var $hasMany = array(
		'PosPurchaseDetail' => array(
			'className' => 'PosPurchaseDetail',
			'foreignKey' => 'pos_purchase_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		
		'PosPurchaseReturn' => array(
			'className' => 'PosPurchaseReturn',
			'foreignKey' => 'pos_purchase_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
	);
 
	

}
