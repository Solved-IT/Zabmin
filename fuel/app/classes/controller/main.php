<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of main
 *
 * @author m.vanson
 */
require_once APPPATH . '/modules/zabbix/ZabbixApi.class.php';

use ZabbixApi\ZabbixApi;

class Controller_Main extends Controller_Template {

    //Call Parent to reference controller
    public function before() {
        parent::before();

        /*
         * Load the config.
         * Very important!
         * Stuff will break without this!
         */
        Config::load('zabmin');

        /*
         * Is logging option enabled ?
         * If so, we'll require a valid login
         */
        if (Config::get('zabminRequireLogin') == true) {

            // Create current_user variable
            $this->current_user = Auth::check() ? Model_User::find(Arr::get(Auth::get_user_id(), 1)) : null;

            // Set a global variable so views can use it
            View::set_global('current_user', $this->current_user);

            //
            if (Request::active()->action != 'login') {
                Response::redirect('users/login');
            }
        }

        /*
         * Get some zabbix magix
         */
        $this->api = new ZabbixApi('http://monitor.solved-it.nu/zabbix/api_jsonrpc.php', Config::get('zabbixUserName'), Config::get('zabbixPassWord'));

        /*
         *  create the layout view
         */
        $this->view = View::forge('template');

        /*
         * Get and display the recent events
         */
        if (!empty(Config::get('menuDisplayRecentEvents'))) {
            $latestEvents = $this->api->EventGet(array(
                'output' => 'extend',
                'selectHosts' => 'extend',
                'select_alerts' => 'extend',
                'selectRelatedObject' => 'extend',
                'limit' => Config::get('menuNumberOfRecentEvents'),
                'sortfield' => 'clock',
                'sortorder' => 'DESC'
            ));
            $this->view->set_global('latestEvents', $latestEvents);
        }

        $this->view->set_global('site_title', 'Zabmin | Solved-IT');

        //assign views as variables, lazy rendering
        $this->view->header = View::forge('header');
        $this->view->sidebar = View::forge('sidebar');
    }

    public
            function subDateTime($strSubstractBy) {
        $datetime = new DateTime();
        $datetime->sub(new DateInterval($strSubstractBy));
        return $datetime->getTimestamp();
    }

}

// End Main class


    