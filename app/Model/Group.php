<?php
App::uses('AppModel', 'Model');
/**
 * Group Model
 *
 * @property Permission $Permission
 * @property User $User
 */
class Group extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'minlength' => array(
				'rule' => array('minlength', '3'),
				'message' => 'Group name cannot be empty and must be atleast 3 character long.',
				'allowEmpty' => false,
				'required' => true
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Permission' => array(
			'className' => 'Permission',
			'joinTable' => 'groups_permissions',
			'foreignKey' => 'group_id',
			'associationForeignKey' => 'permission_id',
			'unique' => true
		),
		'User' => array(
			'className' => 'User',
			'joinTable' => 'groups_users',
			'foreignKey' => 'group_id',
			'associationForeignKey' => 'user_id',
			'unique' => true
		)
	);

}
