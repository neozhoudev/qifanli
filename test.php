<?php
if(!$_GET['itemid']) exit();
date_default_timezone_set("PRC");
set_time_limit(0);//无限请求超时时间 
$itemid = $_GET['itemid'];

$timed = dirname(__FILE__)."/item/".$itemid.".txt";
//echo $timed;


if(file_exists($timed) && abs(filesize($timed)) > 0){
    
    //判断大小
     
    echo file_get_contents($timed);
    
}else{
    //创建
    $file = fopen($timed, "w");
    //chmod($timed,0777);
    fclose($file);
    while (true) {
        
        sleep(3);
        if(abs(filesize($timed)) > 0)break;
        clearstatcache();

    }
    
    
    
    echo file_get_contents($timed);
    

}

?>
