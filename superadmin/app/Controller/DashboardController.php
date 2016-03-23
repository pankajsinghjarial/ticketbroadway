<?php
/**
 * Dashboard controller.
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

App::uses('DashboardController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class DashboardController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array('Order','WpUsers');
    public $components=array('Common');
/**
 * Displays a view
 *
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function index() {
        $fields = array('id','full_name', 'event_name','venue','total');
        $limit = 5;
        $orderField = 'id';
        $orderDir = 'desc';
        $orderType = $orderField." ".$orderDir;
        $recentOrders=$this->Order->find('all',array('fields'=>$fields,'limit'=>$limit,'order'=>$orderType));
        $countRevenue = $this->Order->find('first',array('fields'=>array('SUM(total) as revenue')));
        $revenue = array_shift($countRevenue);
        $totalRevenue = $this->Common->number_shorten($revenue['revenue']);
        $countOrders=$this->Order->find('count');
        //Graph Orders
        $monthData = array('label'=>array('JAN','FEB','MAR','APR','MAY','JUN','JUL','AUG','SEP','OCT','NOV','DEC'),'usersCount'=>array(0,0,0,0,0,0,0,0,0,0,0,0),'salesCount'=>array(0,0,0,0,0,0,0,0,0,0,0,0));
        $fields = array();
        $fields[] = 'sum(total) as totalSale';
        $fields[] = 'MONTH(created) as graphMonth';
        $conditions[] = "YEAR(created)='".date('Y')."'";
        $countOrderByMonth = $this->Order->find('all',array('fields'=>$fields,'conditions'=>array($conditions), 'group' => 'MONTH(created)'));
        foreach($countOrderByMonth as $orders){
            $orders = array_shift($orders);
            $monthData['salesCount'][$orders['graphMonth']-1] =  $orders['totalSale'];
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
        $countUsers=$this->WpUsers->find('count',array('fields'=>$fields,'joins'=>$joins,'conditions'=>array($conditions)));
        $recentCustomers=$this->WpUsers->find('all',array('fields'=>$fields,'joins'=>$joins,'conditions'=>array($conditions),'limit'=>$limit));
        $taskClasses = array('success','danger','primary','info','warning');
        //Graph Prospect/Customers
        $fields = array();
        $fields[] = 'count(ID) as countUser';
        $fields[] = 'MONTH(user_registered) as graphMonth';
        $conditions[] = "YEAR(WpUsers.user_registered)='".date('Y')."'";
        $countUserByMonth = $this->WpUsers->find('all',array('fields'=>$fields,'joins'=>$joins,'conditions'=>array($conditions), 'group' => 'MONTH(user_registered)'));
        //print_r($monthData);die;
        foreach($countUserByMonth as $users){
            $users = array_shift($users);
            $monthData['usersCount'][$users['graphMonth']-1] =  $users['countUser'];
        }
        $this->set(compact('recentOrders','taskClasses','countOrders','countUsers','recentCustomers','totalRevenue','monthData'));
	}
}
