<?php
//chuange the excerpt length
function new_excerpt_length($length) {
    global $om_options;
    if(is_search()){
        return 25;
    }else{
        if($om_options['blog-layout']=='1'){
            return 80;
        }elseif ($om_options['blog-layout']=='2') {
            return 200;
        }else{
            return 5;
        }
    }
}