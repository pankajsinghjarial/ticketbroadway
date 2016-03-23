<?php
/**
 * Orders controller.
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

App::uses('OrdersController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class OrdersController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();

/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function index() {

	}
    public function all() {
        $this->autoRender = false;
        if($this->request->is('ajax')){
            //echo "<pre>";
            //print_r($this->request->query);
        }
        $fields = array('id','full_name','email', 'event_name','venue','total');
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
        $allOrders=$this->Order->find('all',array('fields'=>$fields,'limit'=>$limit,'offset'=>$offset,'order'=>$orderType,'conditions'=>array('OR'=>$condition)));
        $countOrders=$this->Order->find('count',array('fields'=>$fields));
        $filterOrders=$this->Order->find('count',array('fields'=>$fields,'conditions'=>array('OR'=>$condition)));
        
        $orders = array();
        foreach($allOrders as $order){
            $orders[] = array(
                            $order['Order']['id'],
                            $order['Order']['full_name'],
                            $order['Order']['email'],
                            $order['Order']['event_name'],
                            $order['Order']['venue'],
                            '$'.$order['Order']['total'],
                            '<a href="'.SITE_URL.'/orders/view/'.$order['Order']['id'].'">View</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="'.SITE_URL.'/orders/edit/'.$order['Order']['id'].'">Edit</a>'
                        );
        }
        //print_r($allOrders);
        $data=array(
            'draw'=>$this->request->query['draw'],
            'recordsTotal'=>$countOrders,
            'recordsFiltered'=>$filterOrders,
            'data'=>$orders
        );
        echo json_encode($data);
	}
    public function view($id = null) {
        if(!$id){
        }
        $order=$this->Order->find('first',array('conditions'=>array('id'=>$id)));
        $this->set('order',$order);
	}
    public function edit($id = null) {
        if(!$id){
        }
        if($this->request->is('post')){
            $data = array();
            $data['Order'] = $this->request->data;
            $this->Order->id = $id;
            $this->Order->save($data);
            $this->Session->setFlash(__('Order updated successfully'),'flash_good');
            $this->redirect(SITE_URL.'/orders/edit/'.$id);
        }
        $order=$this->Order->find('first',array('conditions'=>array('id'=>$id)));
        $this->set('order',$order);
	}
}
