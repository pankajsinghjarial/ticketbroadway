<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
 
class WpUsermeta extends AppModel {
    public $useTable = 'wp_usermeta';
    public $primaryKey = 'umeta_id';
}
