<?php
class PosCustomerLedger extends AppModel {
	var $name = 'PosCustomerLedger';
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
}
