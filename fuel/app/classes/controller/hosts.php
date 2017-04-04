<?php

/*
 *  .----------------.  .----------------.  .----------------.  .----------------.  .----------------.  .-----------------.
 * | .--------------. || .--------------. || .--------------. || .--------------. || .--------------. || .--------------. |
 * | |   ________   | || |      __      | || |   ______     | || | ____    ____ | || |     _____    | || | ____  _____  | |
 * | |  |  __   _|  | || |     /  \     | || |  |_   _ \    | || ||_   \  /   _|| || |    |_   _|   | || ||_   \|_   _| | |
 * | |  |_/  / /    | || |    / /\ \    | || |    | |_) |   | || |  |   \/   |  | || |      | |     | || |  |   \ | |   | |
 * | |     .'.' _   | || |   / ____ \   | || |    |  __'.   | || |  | |\  /| |  | || |      | |     | || |  | |\ \| |   | |
 * | |   _/ /__/ |  | || | _/ /    \ \_ | || |   _| |__) |  | || | _| |_\/_| |_ | || |     _| |_    | || | _| |_\   |_  | |
 * | |  |________|  | || ||____|  |____|| || |  |_______/   | || ||_____||_____|| || |    |_____|   | || ||_____|\____| | |
 * | |              | || |              | || |              | || |              | || |              | || |              | |
 * | '--------------' || '--------------' || '--------------' || '--------------' || '--------------' || '--------------' |
 * '----------------'  '----------------'  '----------------'  '----------------'  '----------------'  '----------------' 
 *
 * The free and open source Zabbix frontend.
 *
 * Created by:
 * Solved-IT (www.solved-it.nu)
 * 
 * 
 */

class Controller_Hosts extends Controller_Main {

    public function before() {
        parent::before();
    }

    public function action_index() {
        //$template = 'hosts/index';
        $hosts = $this->api->hostGet(array(
            'selectGroups' => 'extend',
            'selectTriggers' => 'count',
        ));
        //Set hosts for template
        $this->view->set_global('hosts', $hosts);

        // assign global variables so all views have access to them
        $this->view->set_global('title', 'Hosts');
        $this->view->content = View::forge('hosts/index');
        
        // return the view object to the Request
        return $this->view;
    }

}
