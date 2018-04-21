<?php 

class Detail extends CI_Model{

	var $drinfo;

	function manager_detail(){

		require_once ('connect_singleton.php');
		$ldapconn=connect_singleton::getInstance();
		$ldapdn = 'DC=genesispower,DC=co,DC=nz';

		$drattributes=array("cn","title","department","description","employeetype","mail","telephonenumber","lastlogon","directreports","distinguishedname");

		$userfilter=$_SESSION['userfilterr'];
    	$drsr=ldap_search($ldapconn, $ldapdn, $userfilter, $drattributes);
    	$_SESSION['drinfo']=$this->drinfo = ldap_get_entries($ldapconn, $drsr);

    	if(isset($this->drinfo[0]["directreports"][0])){
        	return true;
    	}
    	else{
        	return false;
    	}
    	
	}

	function getDr(){

		require_once ('escape.php');
		require_once ('connect_singleton.php');
		$ldapconn=connect_singleton::getInstance();
		$ldapdn = 'DC=genesispower,DC=co,DC=nz';
		echo'<br>before for<br>';
		for ($i = 0; $i+1<count($this->drinfo[0]["directreports"]); $i++){
        $druser=$this->drinfo[0]["directreports"][$i];
        $druser = ldap_escaped($druser);
        $druserfilter="(&(objectClass=person)(objectClass=user)(distinguishedname=$druser))";
        $druserattribute = array("cn","title","department","description","employeetype","mail","telephonenumber","lastlogon","manager");
        $drusersr=ldap_search($ldapconn, $ldapdn, $druserfilter, $druserattribute);
        $_SESSION['druserinfo']=ldap_get_entries($ldapconn, $drusersr);
        $this->load->model('Database');
    	$this->Database->dr_save();
    	}
	}
}
?>