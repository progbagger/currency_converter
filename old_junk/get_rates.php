<?php
function get_rates() {
    global $API_URL;
    $res = file_get_contents($API_URL);
    return $res;
}    
?>