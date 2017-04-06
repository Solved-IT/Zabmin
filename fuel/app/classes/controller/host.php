<?php

/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.8
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2016 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Host extends Controller_Main {

    public function before() {
        parent::before();
    }

    public function action_index() {
        // Get host information
        $data['host'] = $this->api->hostGet(array(
            'filter' => array('hostid' => $this->param('hostid'))
        ));

        // Get items
        $data['items'] = $this->api->itemGet(array(
            'filter' => array('hostid' => $this->param('hostid'))
        ), 'key_');

        // Get triggers
        $data['triggers'] = $this->api->triggerGet(array(
            'filter' => array(
                'hostid' => $this->param('hostid'),
                'value' => '1')
        ), 'key_');
        
        $this->view->set_global('data', $data);
        $this->view->set_global('hostid', $this->param('hostid'));
        $this->view->set_global('title', 'Host: '. $data['host'][0]->name);
        $this->view->content = View::forge('host/view');

        // return the view object to the Request
        return $this->view;
    }

    public function action_view() {
        
    }

}
