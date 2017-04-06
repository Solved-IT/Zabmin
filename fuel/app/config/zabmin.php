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
 * This is the main configuration file. Use this file to configure the frontend.
 * Make sure this file is not readable by the outside world! 
 * 
 */
return array(
    /*
     * Zabbix username and password. These credentials will be used to connect to the Zabbix API
     * Value: zabbix credentials
     */
    'zabbixUserName' => 'Admin',
    'zabbixPassWord' => 'zabbix',
    
    /*
     * Would you like to have people login to use Zabmin?
     * Setting this to 'true' will require login with the above credentials
     * This is option is not currently supported because the default Auth driver only allows database backed login's
     * Value: true|false
     */
    'zabminRequireLogin' => false,
    
    
    /*
     * Checks for host view page
     * These are the key's Zabmin will display in the 3 boxes at the top of the host page.
     * Value: any check in Zabbix
     */
    'hostViewMemoryUsage' => 'vm.memory.size[pfree]', 
    'hostViewProcLoad' => array('system.cpu.load[percpu,avg1]', 'hrProcessorLoad[61]'),
    'hostViewDiskUsage' => 'vfs.fs.size[C:,pfree]',
    
    /*
     * Chart type to use for chart page
     * Value: area|line
     */
    'chartsLineType' => 'area',
    
    /*
     * Should we display recent events and if so,
     * how many events should we display on the short menu ?
     * Value: true|false
     * Value: integer
     */
    'menuDisplayRecentEvents' => true,
    'menuNumberOfRecentEvents' => 10,
    
    /*
     * Display raw API output
     * This is helpful for troubleshooting (displays A LOT OF DATA)
     * Value: true|false
     */
    'displayRawApiOutput' => true,
    
    /*
     * Time format
     * http://php.net/manual/en/function.date.php
     */
    'dateTimeFormat' => 'j F Y - H:i:s',
);
