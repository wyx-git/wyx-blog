<?php
$f=$_FILES["thumb"];
if (!is_dir("./upload")){
    mkdir("./upload");
}
$arr=explode(".",$f['name']);
$extname=array_pop($arr);
$filename=md5(time()).".".$extname;
if (is_uploaded_file($f["tmp_name"])){
    move_uploaded_file($f["tmp_name"],"./upload/".$filename);
}
echo "./upload/".$filename;