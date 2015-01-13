<?php
class PosCustomer extends AppModel {
	var $name = 'PosCustomer';
	var $displayField = 'name';
	 
	 var $hasMany = array(
	'PosCustomerLedger' => array(
			'className' => 'PosCustomerLedger',
			'foreignKey' => 'pos_customer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
	);


}
