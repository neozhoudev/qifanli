<?php
if(!$_GET['act']) exit();
date_default_timezone_set("PRC");
set_time_limit(0);//无限请求超时时间 
$act = $_GET['act'];


  $hostdir=dirname(__FILE__)."/item/";

//获取本文件目录的文件夹地址

  $filesnames = scandir($hostdir);

    if($act == "get"){
        
        
        //获取所有txt文件
        foreach($filesnames as $name){
			
			$size = filesize($hostdir.$name);
			
            if(pathinfo($name, PATHINFO_EXTENSION) == "txt" && $size == 0){
				//echo $size;
                echo str_replace(".txt","|",$name);

            }

        }

    }else if($act == "set"){
        
        
        
        if(!$_GET['id'])exit();
        $id = $_GET['id'];
        $tburl = $_GET['tburl'];
        
        $file = fopen($hostdir.'/'.$id.'.txt', "w");
        fwrite($file, $tburl);
        fclose($file);
        echo 'ok';
        exit();
        
        
    }


?>
