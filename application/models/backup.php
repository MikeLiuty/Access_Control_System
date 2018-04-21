<?php
class Login_verify extends CI_Model{

	 var $ldapconn;

	function connect(){
    	$ldapserver = 'genesispower.co.nz'; 
		$ldaprdn  = 'zmiketestaccount';   
		$ldappass = 'b24!Handlebars82';  
		
    	$this->ldapconn = ldap_connect($ldapserver,389)
	    or die("Could not connect to LDAP server.");
	     
	    ldap_set_option($this->ldapconn, LDAP_OPT_REFERRALS, 0);
	    ldap_set_option($this->ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);

		if ($this->ldapconn) {
		    $ldapbind = ldap_bind($this->ldapconn, $ldaprdn, $ldappass);
		    echo 'connected!<br>';
		    }

		else{
		    echo 'Unable to connect the server, please try again.';
		}
	} 

	function verify($username,$password){

		$ldapdn = 'DC=genesispower,DC=co,DC=nz';
		$userfilter="(&(objectClass=person)(objectClass=user)(sAMAccountName=$username))";
		$userattributes = array("cn" );
		$usersr=ldap_search($this->ldapconn, $ldapdn, $userfilter, $userattributes);
		$userinfo = ldap_get_entries($this->ldapconn, $usersr);
		$ldapdn_user = 'CN='.$userinfo[0]["cn"][0].',OU=Standard,OU=User Accounts,DC=genesispower,DC=co,DC=nz';
		// var_dump($ldapdn_user);
		// var_dump($this->ldapconn);
		$ldapbind_user=ldap_bind($this->ldapconn, $ldapdn_user, $password);

		if ($ldapbind_user){
			return true;
		}
		else{
			return false;
		}
	}
}
 ?>