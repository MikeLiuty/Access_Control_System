<?php


class Connect_singleton{

	private static $ldapconn = null;

	private function __construct(){}	

	public static function getInstance(){

		if (self::$ldapconn ==null){
			$ldapserver = 'genesispower.co.nz'; 
			$ldaprdn  = 'zmiketestaccount';   
			$ldappass = 'b24!Handlebars82';  
			
			self::$ldapconn = ldap_connect($ldapserver,389)
		    or die("Could not connect to LDAP server.");
		     
		    ldap_set_option(self::$ldapconn, LDAP_OPT_REFERRALS, 0);
		    ldap_set_option(self::$ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);

				if (self::$ldapconn) {
				    $ldapbind = ldap_bind(self::$ldapconn, $ldaprdn, $ldappass);
				    echo 'AD connected!<br>';
				    }

				else{
				    echo 'Unable to connect the server, please try again.';
				}
		}

	return self::$ldapconn;
	}
}

 ?>