<?php class PosSale extends AppModel {
	var $name = 'PosSale';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'PosCustomer' => array(
			'className' => 'PosCustomer',
			'foreignKey' => 'pos_customer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	var $hasMany = array(
		'PosSaleDetail' => array(
			'className' => 'PosSaleDetail',
			'foreignKey' => 'pos_sale_id',
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
		'PosSaleReturn' => array(
			'className' => 'PosSaleReturn',
			'foreignKey' => 'pos_sale_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		
		
		
	);

}
