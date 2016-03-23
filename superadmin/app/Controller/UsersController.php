<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

    public $uses = array('WpUsers','WpUsermeta','User');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }

    public function login() {
        $this->layout='login';
        //if already logged-in, redirect
        if($this->Session->check('Auth.User')){
            $this->redirect(array('controller'=>'dashboard'));      
        }
         
        // if we get the post information, try to authenticate
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Session->setFlash(__('Invalid username or password'),'flash_error');
            }
        } 
    }
 
    public function logout() {
        $this->redirect($this->Auth->logout());
    }
 
    public function index() {
        


        //~ $this->paginate = array(
            //~ 'limit' => 6,
            //~ 'order' => array('User.username' => 'asc' )
        //~ );
        //~ $users = $this->paginate('User');
        //~ $this->set(compact('users'));
    }
 
 
    public function add() {
        $this->layout='empty';
        if ($this->request->is('post')) {
                 
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been created'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be created. Please, try again.'));
            }   
        }
    }
 
    public function edit($id = null) {
        if(!$id){
        }
        if($this->request->is('post')){
            $this->WpUsers->updateAll(array("display_name"=>"'".$this->request->data['name']."'"),array("ID"=> $id));
            $this->WpUsers->updateAll(array("user_email"=>"'".$this->request->data['email']."'"),array("ID"=> $id));
            $this->saveUserMeta($id,'billing_address_1',$this->request->data['address1']);
            $this->saveUserMeta($id,'billing_address_2',$this->request->data['address2']);
            $this->saveUserMeta($id,'billing_city',$this->request->data['city']);
            $this->saveUserMeta($id,'billing_state',$this->request->data['state']);
            $this->saveUserMeta($id,'billing_country',$this->request->data['country']);
            $this->saveUserMeta($id,'billing_postcode',$this->request->data['postcode']);
            $this->saveUserMeta($id,'billing_phone',$this->request->data['phone']);
            $this->Session->setFlash(__('User updated successfully'),'flash_good');
            $this->redirect(SITE_URL.'/users/edit/'.$id);
        }
        $user=$this->WpUsers->find('first',array('conditions'=>array('ID'=>$id)));
        $metas=$this->WpUsermeta->find('all',array('conditions'=>array('user_id'=>$id)));
        foreach($metas as $meta){
            $user['WpUsers'][$meta['WpUsermeta']['meta_key']] = $meta['WpUsermeta']['meta_value'];
        }
        $this->set(compact('user'));
	}
 
    public function delete($id = null) {
        if($_REQUEST['st']){
            $this->Session->setFlash(__('User ( ID : '.$id.' ) is deleted'),'flash_good');
        }else{
            $this->Session->setFlash(__('User was not deleted. Please try again.'),'flash_error');
        }
        $this->redirect(array('action' => 'index'));
    }
     
    public function activate($id = null) {
         
        if (!$id) {
            $this->Session->setFlash('Please provide a user id');
            $this->redirect(array('action'=>'index'));
        }
         
        $this->User->id = $id;
        if (!$this->User->exists()) {
            $this->Session->setFlash('Invalid user id provided');
            $this->redirect(array('action'=>'index'));
        }
        if ($this->User->saveField('status', 1)) {
            $this->Session->setFlash(__('User re-activated'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not re-activated'));
        $this->redirect(array('action' => 'index'));
    }

    public function beforeSave($options = array()) {
        if (isset($this->data['User']['password'])) {
            $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
        }
        return true;
    }
    
    public function admin_profile(){
        if($this->request->is('post')){
            $this->User->updateAll(array("username"=>"'".$this->request->data['username']."'","email"=>"'".$this->request->data['email']."'"),array("role" => 'admin'));
            $this->Session->setFlash(__('Admin details updated successfully'),'flash_good');
            $this->redirect(SITE_URL.'/users/admin_profile/');
        }
        $fields = array('id','username','email');
        $conditions = array(
            'User.role' => 'admin'
        );
        $admin = $this->User->find('first',array('fields'=>$fields,'conditions'=>$conditions));
        $this->set('admin',$admin);
        
    }
    
    public function admin_profile_pic(){
        if($this->request->is('post')){
            if(empty($this->request->data)){
                $this->Session->setFlash(__('Please upload an image'),'flash_error');
            }else{
                if($this->request->data['User']['file1']['type'] != 'image/jpeg'){
                    $this->Session->setFlash(__('Please upload jpg image only'),'flash_error');
                }else{
                    move_uploaded_file($this->request->data['User']['file1']['tmp_name'],WWW_ROOT.'img/avatars/profile_avatar.jpg');
                    $this->Session->setFlash(__('Admin image updated successfully'),'flash_good');
                    $this->redirect(SITE_URL.'/users/admin_profile_pic/');
                }
            }
        }
    }

	public function change_admin_password() {
        if($this->request->is('post')){
            $old_password = AuthComponent::password($this->request->data['old_password']);
            if($this->User->find('count',array('conditions'=>array('role'=>'admin','password'=>$old_password)))){
                if($this->request->data['password'] == "" || $this->request->data['confirmPassword'] == ""){
                    $this->Session->setFlash(__('Please fill all fields'),'flash_error');
                }else{
                    if($this->request->data['password'] != $this->request->data['confirmPassword']){
                        $this->Session->setFlash(__('Password not matching'),'flash_error');
                    }else{
                        $this->User->updateAll(array("password"=>"'".AuthComponent::password($this->request->data['password'])."'"),array("role" => 'admin'));
                        $this->Session->setFlash(__('Password updated'),'flash_good');
                        $this->request->data = array();
                    }
                }
            }else{
                $this->Session->setFlash(__('Old password is not correct'),'flash_error');
            }
        }
        $admin = $this->request->data;
        $this->set('admin',$admin);
	}

    public function all() {
        $this->autoRender = false;
        if($this->request->is('ajax')){
            //echo "<pre>";
            //print_r($this->request->query);
        }
        $fields = array('ID','display_name','user_email','user_registered');
        $conditions = array(
            'WpUsermeta.meta_key' => 'wp_capabilities',
            'WpUsermeta.meta_value LIKE' => '%subscriber%'
        );
        $condition = array();
        $joins = array(
                    array(
                        'table' => 'wp_usermeta',
                        'alias' => 'WpUsermeta',
                        'type' => 'LEFT',
                        'conditions' => array(
                            'WpUsermeta.user_id=WpUsers.id'
                        )
                    )
                );
        $searchField = $this->request->query['search']['value'];
        if($searchField){
            foreach($fields as $field){
                $condition[$field." LIKE" ] = "%".$searchField."%";
            }
        }
        $orderType = "";
        if(isset($this->request->query['order'])){
            $orderField = $fields[$this->request->query['order'][0]['column']];
            $orderDir = $this->request->query['order'][0]['dir'];
            $orderType = $orderField." ".$orderDir;
        }
        $limit = $this->request->query['length'];
        $offset = $this->request->query['start'];
        $allUsers=$this->WpUsers->find('all',array('fields'=>$fields,'joins'=>$joins,'limit'=>$limit,'offset'=>$offset,'order'=>$orderType,'conditions'=>array($conditions,'OR'=>$condition)));
        $countOrders=$this->WpUsers->find('count',array('fields'=>$fields,'joins'=>$joins,'conditions'=>array($conditions)));
        $filterOrders=$this->WpUsers->find('count',array('fields'=>$fields,'joins'=>$joins,'conditions'=>array($conditions,'OR'=>$condition)));
        
        $users = array();
        foreach($allUsers as $user){
            //Check if lead coming from facebook
            $loginSource = 'Site Registered';
            if($this->WpUsermeta->find('count',array('conditions' => array('user_id'=>$user['WpUsers']['ID'],'meta_key'=>'_fb_user_id')))){
                $loginSource = 'facebook';
            }
            if($this->WpUsermeta->find('count',array('conditions' => array('user_id'=>$user['WpUsers']['ID'],'meta_key'=>'wsl_current_provider')))){
                $loginSource = 'twitter';
            }
            if($this->WpUsermeta->find('count',array('conditions' => array('user_id'=>$user['WpUsers']['ID'],'meta_key'=>'_login_with_amazon')))){
                $loginSource = 'amazon';
            }
            $users[] = array(
                            $user['WpUsers']['ID'],
                            htmlentities($user['WpUsers']['display_name']),
                            $user['WpUsers']['user_email'],
                            $user['WpUsers']['user_registered'],
                            $loginSource,
                            '<a href="'.SITE_URL.'/users/edit/'.$user['WpUsers']['ID'].'">Edit</a> | <a data-id="'.$user['WpUsers']['ID'].'" class="delete-user" href="javascript:void(0);">Delete</a>'
                        );
        }
        //print_r($allOrders);
        $data=array(
            'draw'=>$this->request->query['draw'],
            'recordsTotal'=>$countOrders,
            'recordsFiltered'=>$filterOrders,
            'data'=>$users
        );
        
        echo json_encode($data);
	}
    
    public function saveUserMeta($userId,$metaKey,$metaValue){
            if($this->WpUsermeta->find('count',array('conditions'=>array('meta_key'=>$metaKey,'user_id'=>$userId)))){
                $this->WpUsermeta->updateAll(array("meta_value"=>"'".$metaValue."'"),array("meta_key"=>$metaKey,"user_id"=> $userId));
            }else{
                $this->WpUsermeta->set('meta_key',$metaKey);
                $this->WpUsermeta->set('user_id',$userId);
                $this->WpUsermeta->set('meta_value',$metaValue);
                $this->WpUsermeta->save();
            }
    }

}
