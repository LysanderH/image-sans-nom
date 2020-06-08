<?php
/**
 *
 */
function bp_register_query_vars($vars){
    $vars[]='exhibitions-pagination';
    $vars[]='books-pagination';
    return $vars;
}
add_filter('query_vars','bp_register_query_vars');