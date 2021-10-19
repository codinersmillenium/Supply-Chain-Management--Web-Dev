<?php 
    function sender_info() {
        $info = '';
        $info .= (getHostByName(php_uname('n'))) ? '<br>'.getHostByName(php_uname('n')) : '';
        $info .= (getenv('HTTP_CLIENT_IP')) ? '<br>'.getenv('HTTP_CLIENT_IP') : '';
        $info .= (getenv('HTTP_X_FORWARDED_FOR')) ? '<br>'.getenv('HTTP_X_FORWARDED_FOR') : '';
        $info .= (getenv('HTTP_X_FORWARDED')) ? '<br>'.getenv('HTTP_X_FORWARDED') : '';
        $info .= (getenv('HTTP_FORWARDED_FOR')) ? '<br>'.getenv('HTTP_FORWARDED_FOR') : '';
        $info .= (getenv('HTTP_FORWARDED')) ? '<br>'.getenv('HTTP_FORWARDED') : '';
        $info .= (getenv('HTTP_CLIENT_IP')) ? '<br>'.getenv('HTTP_CLIENT_IP') : '';
        $info .= (getenv('REMOTE_ADDR')) ? '<br>'.getenv('REMOTE_ADDR') : '';

        $MAC = exec('getmac'); 
        $MAC = strtok($MAC, ' '); 
        $info .= '<br>'.$MAC;

        return $info;
    }
?>