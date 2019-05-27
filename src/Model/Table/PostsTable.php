<?php

namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;
/*posts table class */
class PostsTable extends Table
{
  public function initialize(array $config)
  {
    $this->addBehavior('Timestamp');
  }

  public function validationDefault(Validator $validator)
  {
// validation min 20
    $validator
      ->notEmpty('title')
      ->requirePresence('title')
      ->notEmpty('body')
      ->requirePresence('body')
      ->add('body', [
        'length' => [
          'rule' => ['minLength', 20],
          'message' => 'body length must be 20+'
        ]
      ]);
    return $validator;
  }
}
