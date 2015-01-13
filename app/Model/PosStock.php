<?php
class PosStock extends AppModel {
	var $name = 'PosStock';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'PosProduct' => array(
			'className' => 'PosProduct',
			'foreignKey' => 'pos_product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
