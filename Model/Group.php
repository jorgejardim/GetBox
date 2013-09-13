<?php
App::uses('AppModel', 'Model');

/**
 * Group Model
 *
 * @property User $User
 */
class Group extends AppModel {
	
	/**
	 * Define os Behaviors utilizados pelo Model
	 *
	 * @var array
	 * @access public
	 * @link http://book.cakephp.org/pt/view/1072/Usando-Behaviors
	 */
	public $actsAs = array(
			'Acl' => array(
					'type' => 'requester'
			),
			'AuditLog.Auditable',
	);

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
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
		'reference' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'admin' => array(
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
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
    		'User' => array(
    				'className' => 'User',
    				'foreignKey' => 'group_id',
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

    /**
     * Parent Node
     *
     * Função que pega o registro "Pai" do grupo atual
     *
     * @return null
     * @access public
     */
    public function parentNode() {
        return null;
    }
    
    /**
     * After Save
     *
     * Função de callback após salvar o registro
     * para que quando adicionados, alterados ou excluídos,
     * a tabela Aro seja atualizada automáticamente.
     *
     * @param boolean $created Será true se for um novo registro
     * @access public
     * @link http://book.cakephp.org/pt/view/1053/afterSave
     */
    function afterSave($created) {
    	$node = $this->node();
    	$aro = $node[0];
    	$aro['Aro']['alias'] = $this->data['Group']['name'];
    	$this->Aro->save($aro);
    }
}