<?php
/**
 * NotifiedUsersController controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('NotifiedUsersController', 'Controller');

class NotifiedUsersController extends AppController {
    public $uses = array('NotifiedUser');

	public function index() {

	}
    public function all() {
        $this->autoRender = false;
        if($this->request->is('ajax')){
            //echo "<pre>";
            //print_r($this->request->query);
        }
        $fields = array('id','first_name','last_name','email');
        $condition = array();
        $searchField = $this->request->query['search']['value'];
        if($searchField){
            foreach($fields as $field){
                $condition[$field." LIKE" ] = "%".$searchField."%";
            }
        }
        $orderField = $fields[$this->request->query['order'][0]['column']];
        $orderDir = $this->request->query['order'][0]['dir'];
        $orderType = $orderField." ".$orderDir;
        $limit = $this->request->query['length'];
        $offset = $this->request->query['start'];
        $allUsers=$this->NotifiedUser->find('all',array('fields'=>$fields,'limit'=>$limit,'offset'=>$offset,'order'=>$orderType,'conditions'=>array('OR'=>$condition)));
        $countOrders=$this->NotifiedUser->find('count',array('fields'=>$fields));
        $filterOrders=$this->NotifiedUser->find('count',array('fields'=>$fields,'conditions'=>array('OR'=>$condition)));
        
        $users = array();
        foreach($allUsers as $user){
            $users[] = array(
                            $user['NotifiedUser']['id'],
                            $user['NotifiedUser']['first_name'],
                            $user['NotifiedUser']['last_name'],
                            $user['NotifiedUser']['email'],
                            '<a href="'.SITE_URL.'/notifiedUsers/edit/'.$user['NotifiedUser']['id'].'">Edit</a> | <a data-id="'.$user['NotifiedUser']['id'].'" onclick="return confirm(\'Are you sure?\');" href="'.SITE_URL.'/notifiedUsers/delete/'.$user['NotifiedUser']['id'].'">Delete</a>'
                        );
        }
        //print_r($allUsers);die;
        $data=array(
            'draw'=>$this->request->query['draw'],
            'recordsTotal'=>$countOrders,
            'recordsFiltered'=>$filterOrders,
            'data'=>$users
        );
        echo json_encode($data);
	}

    public function edit($id = null) {
        if(!$id){
        }
        if($this->request->is('post')){
            $data = array();
            $data['NotifiedUser'] = $this->request->data;
            $this->NotifiedUser->id = $id;
            $this->NotifiedUser->save($data);
            $this->Session->setFlash(__('User details updated successfully'),'flash_good');
            $this->redirect(SITE_URL.'/notifiedUsers/edit/'.$id);
        }
        $user=$this->NotifiedUser->find('first',array('conditions'=>array('id'=>$id)));
        $this->set('user',$user);
	}

    public function delete($id = null) {
        if($this->NotifiedUser->delete($id)){
            $this->Session->setFlash(__('User ( ID : '.$id.' ) is deleted'),'flash_good');
        }else{
            $this->Session->setFlash(__('User was not deleted. Please try again.'),'flash_error');
        }
        $this->redirect(array('action' => 'index'));
    }
}
