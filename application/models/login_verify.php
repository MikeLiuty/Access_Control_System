<?php
class Login_verify extends CI_Model{

	function verify($username,$password){

		require_once ('connect_singleton.php');
		$ldapconn=connect_singleton::getInstance();

		$ldapdn = 'DC=genesispower,DC=co,DC=nz';

		session_start();
		$userfilter=$_SESSION['userfilterr']="(&(objectClass=person)(objectClass=user)(sAMAccountName=$username))";
		header('detail.php');

		$userattributes = array("cn" );
		$usersr=ldap_search($ldapconn, $ldapdn, $userfilter, $userattributes);
		$userinfo = ldap_get_entries($ldapconn, $usersr);
		$ldapdn_user = 'CN='.$userinfo[0]["cn"][0].',OU=Standard,OU=User Accounts,DC=genesispower,DC=co,DC=nz';
		$ldapbind_user=ldap_bind($ldapconn, $ldapdn_user, $password);

		if ($ldapbind_user){
			return true;
		}
		else{
			return false;
		}
	}
}
 ?>