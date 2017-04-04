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
 * This controller takes care of authentication. To use global authentication, please enable in config: zabmin.php
 * 
 */

class Controller_Users extends Controller_Main {

    public function before() {
        parent::before();
    }

    public function action_login() {
        if (Auth::check()) {
            Response::redirect('dashboard');
        }

        if (Input::method() == 'POST') {
            if (Auth::login(Input::post('username'), Input::post('password'))) {
                Session::set_flash('array', array('type' => 'success', 'message' => 'You have logged in!'));
                Response::redirect('dashboard');
            } else {
                Session::set_flash('array', array('type' => 'error', 'message' => 'Invalid login credentials. Please try again !'));
            }
        }
        
        View::set_global('title', 'Login');
        $this->view->content = View::forge('users/login');
        
        // return the view object to the Request
        return $this->view;
    }

    public function action_logout() {
        Auth::logout();
        Session::set_flash('array', array('type' => 'success', 'message' => 'You have been successfully logged out.'));
        Response::redirect('/login');
    }

}