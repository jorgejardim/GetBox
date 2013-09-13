<?php
App::uses('AppModel', 'Model');
App::uses('AuthComponent', 'Controller/Component');

/**
 * User Model
 *
 * @property Group $Group
 */
class User extends AppModel {

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'active' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = array(
			'Group' => array(
					'className' => 'Group',
					'foreignKey' => 'group_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
			)
	);	
		
	/**
	 * Define os Behaviors utilizados pelo Model
	 *
	 * @var array
	 * @access public
	 * @link http://book.cakephp.org/pt/view/1072/Usando-Behaviors
	 */
	public $actsAs = array(
			'AuditLog.Auditable',
	);
	
    /**
     * Binds the User's permission always to the Group.
     * This makes the Acl Behavior to not update the Aros table every time
     * a users is added, because only the Group permissions matter, there is no
     * per-user permission setting.
     *
     * @param string $user
     * @return void
     * @author Augusto Pascutti
     */
    public function bindNode($user) {
        return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
    } 

    /**
     * Save Hash
     *
     * Cria o Hash da senha antes de salvar
     */
    public function beforeSave($options = array()) {
        $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        return true;
    } 
}
