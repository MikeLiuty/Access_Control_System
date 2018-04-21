<?php 
class Database extends CI_Model{

function dr_save(){
	
	require_once ('database_singleton.php');
	$dbconn=Db_singleton::getdbconn();
	$druserinfo= $_SESSION['druserinfo'];

    $ru_cn=isset($druserinfo[0]["cn"][0]) ? $druserinfo[0]["cn"][0] : 'None';
	

	$ru_title=isset($druserinfo[0]["title"][0]) ? $druserinfo[0]["title"][0] : 'None';

	$ru_department=isset($druserinfo[0]["department"][0]) ? $druserinfo[0]["department"][0] : 'None';

	$ru_description=isset($druserinfo[0]["description"][0]) ? $druserinfo[0]["description"][0] : 'None';

	$ru_employeetype=isset($druserinfo[0]["employeetype"][0]) ? $druserinfo[0]["employeetype"][0] : 'None';
	

	$ru_mail=isset($druserinfo[0]["mail"][0]) ? $druserinfo[0]["mail"][0] : 'None';

	$ru_telephonenumber=isset($druserinfo[0]["telephonenumber"][0]) ? $druserinfo[0]["telephonenumber"][0] : '0';

	$ru_lastlogon=isset($druserinfo[0]["lastlogon"][0]) ? $druserinfo[0]["lastlogon"][0] : '0';
	
	$ru_manager=isset($druserinfo[0]["manager"][0]) ? $druserinfo[0]["manager"][0] : 'None';
	
	$ru_sql = "INSERT INTO user_detail(ru_cn,Title,Department,Description,EmployeeType,Email,PhoneNumber,LastLogon,mg_dn)
	        VALUES ('$ru_cn','$ru_title','$ru_department','$ru_description','$ru_employeetype','$ru_mail','$ru_telephonenumber','$ru_lastlogon','$ru_manager')
	        ON DUPLICATE KEY UPDATE  Title = '$ru_title', Department='$ru_department', Description='$ru_description', Employeetype='$ru_employeetype', Email='$ru_mail',
	        PhoneNumber='$ru_telephonenumber', LastLogon='$ru_lastlogon', mg_dn='$ru_manager'";

	if ($dbconn->query($ru_sql) === TRUE) {
	    echo "user done <br><br>";
	    } 
	if ($dbconn->query($ru_sql) === FALSE){
	    echo "Error: " . $ru_sql . "<br>" . $dbconn->errorCode().'<br><br>';
	    }
	    else {return true;}
}

function mg_save(){
	require_once ('database_singleton.php');
	$dbconn=Db_singleton::getdbconn();
	$drinfo= $_SESSION['drinfo'];

     $mg_cn=isset($drinfo[0]["cn"][0]) ? $drinfo[0]['cn'][0] : 'None';
  
    $mg_title=isset($drinfo[0]["title"][0]) ? $drinfo[0]["title"][0] : 'None';

    $mg_department=isset($drinfo[0]["department"][0]) ? $drinfo[0]["department"][0] : 'None';

    $mg_description=isset($drinfo[0]["description"][0]) ? $drinfo[0]["description"][0] : 'None';

    $mg_employeetype=isset($drinfo[0]["employeetype"][0]) ? $drinfo[0]["employeetype"][0] : 'None';

    $mg_mail=isset($drinfo[0]["mail"][0]) ? $drinfo[0]["mail"][0] : 'None';

    $mg_telephonenumber=isset($drinfo[0]["telephonenumber"][0]) ? $drinfo[0]["telephonenumber"][0] : '0';
  
    $mg_lastlogon=isset($drinfo[0]["lastlogon"][0]) ? $drinfo[0]["lastlogon"][0] : '0';
    
   $mg_dn=isset($drinfo[0]["distinguishedname"][0]) ? $drinfo[0]["distinguishedname"][0] : 'None';

    $mg_sql = "INSERT INTO manager_detail(mg_cn,Title,Department,Description,EmployeeType,Email,PhoneNumber,LastLogon,mg_dn) 
            VALUES ('$mg_cn','$mg_title','$mg_department','$mg_description','$mg_employeetype','$mg_mail','$mg_telephonenumber','$mg_lastlogon','$mg_dn')
            ON DUPLICATE KEY UPDATE  Title = '$mg_title', Department='$mg_department', Description='$mg_description', Employeetype='$mg_employeetype', Email='$mg_mail',
            PhoneNumber='$mg_telephonenumber', LastLogon='$mg_lastlogon', mg_dn='$mg_dn'";
    $score_sql="INSERT INTO score_system(mg_cn,mg_dn) VALUES ('$mg_cn','$mg_dn')";



    if ($dbconn->query($mg_sql) === TRUE) {
        echo "manager done <br>";
        } 
    if ($dbconn->query($mg_sql) === FALSE){
	    echo "";
	    }

    if ($dbconn->query($score_sql) === TRUE) {
        echo "score doneeeeeeeeeeeeeeeeeeeee <br>";
        } if ($dbconn->query($score_sql) === FALSE){
	    echo "Error: " . $ru_sql . "<br>" . $dbconn->errorCode().'<br><br>';
	    }

}
}
?>