<?php
class PosSupplierLedger extends AppModel {
	var $name = 'PosSupplierLedger';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'PosSupplier' => array(
			'className' => 'PosSupplier',
			'foreignKey' => 'pos_supplier_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
