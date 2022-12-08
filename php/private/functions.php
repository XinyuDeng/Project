<?php
function url_for($script_path) {
    // add the leading '/' if not present
    if($script_path[0] != '/') {
        $script_path = "/" . $script_path;
    }
    return WWW_ROOT . $script_path;
}

function u($string="") {
    return urlencode($string);
}

function h($string="") {
    return htmlspecialchars($string);
}

function is_post_request() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
}




?>