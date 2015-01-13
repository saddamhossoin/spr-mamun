<?php
class PosSaleDetail extends AppModel {
	var $name = 'PosSaleDetail';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'PosSale' => array(
			'className' => 'PosSale',
			'foreignKey' => 'pos_sale_id',
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
	var $hasMany = array(
		'PosSaleReturn' => array(
			'className' => 'PosSaleReturn',
			'foreignKey' => 'pos_sale_detail_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	 
}
