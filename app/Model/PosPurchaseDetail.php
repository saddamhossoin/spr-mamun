<?php
class PosPurchaseDetail extends AppModel {
	var $name = 'PosPurchaseDetail';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'PosPurchase' => array(
			'className' => 'PosPurchase',
			'foreignKey' => 'pos_purchase_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PosBrand' => array(
			'className' => 'PosBrand',
			'foreignKey' => 'pos_brand_id',
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
		'PosPcategory' => array(
			'className' => 'PosPcategory',
			'foreignKey' => 'pos_pcategory_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
