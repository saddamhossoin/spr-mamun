<?php 
class PosSupplier extends AppModel {
	var $name = 'PosSupplier'; 
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
var $hasMany = array(

	'PosSupplierLedger' => array(
			'className' => 'PosSupplierLedger',
			'foreignKey' => 'pos_supplier_id',
			'conditions' => '',
			'fields' => '',
			'order' => array('PosSupplierLedger.id'=>'desc'),
		),
	);
 
}
