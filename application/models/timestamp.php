<?php 

 $date = date('m/d/Y h:i:s a', time());
        $ago=strtotime('-90 days', strtotime($date));
        $winSecs = ($ago+11644473600);
        $agoTime=$winSecs*10000000;

?>