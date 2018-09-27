<?php
function write_log($data){
    $data = (array)$data;
    $data = var_export($data,true);
    file_put_contents('log',$data);
}