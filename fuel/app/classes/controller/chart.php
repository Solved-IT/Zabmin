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
class Controller_Chart extends Controller_Main {

    public function before() {
        parent::before();
    }

    public function action_index() {
        /*
         *  Create a date object for the charts. Today minus 1 year
         */
        $startDate = $this->subDateTime('P1Y');
        $endDate = time();

        /*
         *  Get history of item.
         */
        $history = $this->api->historyGet(array(
            'filter' => array(
                'itemid' => $this->param('itemid'),
                'time_from' => $startDate,
                'time_till' => $endDate
        )));
        $this->view->set_global('history', $history);

        $this->view->set_global('title', 'test');
        $this->view->content = View::forge('chart/index');

        // return the view object to the Request
        return $this->view;
    }

    public function action_view() {
        
    }

}
