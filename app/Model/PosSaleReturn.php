<?php
class PosSaleReturn extends AppModel {
	var $name = 'PosSaleReturn';
	//The Associations below have been created with all possible keys, those that are not needed can be removed


	var $belongsTo = array(
		'PosSale' => array(
			'className' => 'PosSale',
			'foreignKey' => 'pos_sale_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PosCustomer' => array(
			'className' => 'PosCustomer',
			'foreignKey' => 'pos_customer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		 
		)
	);
}
