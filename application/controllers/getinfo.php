<?php

error_reporting(E_ERROR);

class Getinfo extends CI_controller{

    function mginfo(){
        
        $this->load->library('session');
        
        require_once('application/models/database_singleton.php');
        $dbconn = Db_singleton::getdbconn();
        
        $mg_cn = "SELECT mg_cn,Title,Department,Description,EmployeeType,Email,PhoneNumber,LastLogon,mg_dn,Lastmodify, sincelastlogin,subcount FROM manager_detail WHERE mg_dn = " . "'" . $_SESSION['mg_dn'] . "'" . "";
        
        $results = $dbconn->query($mg_cn);
        $results->setFetchMode(PDO::FETCH_ASSOC);
        $array = $results->fetch();
        echo json_encode($array);
    }
    
    function score(){

        $this->load->library('session');
        require_once('application/models/database_singleton.php');
        $dbconn = Db_singleton::getdbconn();
        
        $score   = "SELECT login_times FROM score_system WHERE mg_dn = " . "'" . $_SESSION['mg_dn'] . "'" . "";
        $results = $dbconn->query($score);
        $results->setFetchMode(PDO::FETCH_ASSOC);
        $array = $results->fetch();
        echo json_encode($array);
    }
    
    function drinfo(){

        $this->load->library('session');
        require_once('application/models/database_singleton.php');
        $dbconn = Db_singleton::getdbconn();
        
        $score   = "SELECT ru_cn, Title, Department, Description, EmployeeType, Email, PhoneNumber, LastLogon, mg_dn FROM user_detail WHERE mg_dn = " . "'" . $_SESSION['mg_dn'] . "'" . "";
        $results = $dbconn->query($score);
        $results->setFetchMode(PDO::FETCH_ASSOC);
        $array = $results->fetchAll();
        echo json_encode($array);
    }
    
    
    function serinfo(){
        
        require_once('application/models/database_singleton.php');
        $dbconn = Db_singleton::getdbconn();
        
        $serdata = "SELECT cn, Title, Department, Description, EmployeeType, LastLogon, dn FROM inactive_accounts";
        $results = $dbconn->query($serdata);
        $results->setFetchMode(PDO::FETCH_ASSOC);
        $array = $results->fetchAll();
        echo json_encode($array);
    }

    function topdptmt(){
        
        require_once('application/models/database_singleton.php');
        $dbconn = Db_singleton::getdbconn();
        $topdptmt = "SELECT Department,COUNT(*) FROM inactive_accounts WHERE Department != 'None' GROUP BY Department ORDER BY COUNT(*) DESC LIMIT 10" ;

        $results = $dbconn->query($topdptmt);
        $results->setFetchMode(PDO::FETCH_ASSOC);
        $array = $results->fetchAll();
        echo json_encode($array);
    }

    function toptype(){
        
        require_once('application/models/database_singleton.php');
        $dbconn = Db_singleton::getdbconn();
        $topdptmt = "SELECT EmployeeType,COUNT(*) FROM inactive_accounts WHERE EmployeeType != 'None' GROUP BY EmployeeType ORDER BY COUNT(*) DESC LIMIT 10";

        $results = $dbconn->query($topdptmt);
        $results->setFetchMode(PDO::FETCH_ASSOC);
        $array = $results->fetchAll();
        echo json_encode($array);
    }
}
?> 