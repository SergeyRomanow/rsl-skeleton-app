<?php

/**
* Тестирование переменных окружения $_SERVER
* @var 
* 
*/

    echo("<pre> Value SERVER");
    print_r ($_SERVER);
    echo("</pre>");
    
    echo("<pre>");
    echo("<br/>Значение переменной&nbsp;[DOCUMENT_ROOT]\t\t<b>[ {$_SERVER['DOCUMENT_ROOT']} ]</b>");
    echo("<br/>Значение переменной [CONTEXT_PREFIX]\t\t<b>[ {$_SERVER['CONTEXT_PREFIX']} ]</b>");
    echo("<br/>Значение переменной [CONTEXT_DOCUMENT_ROOT]\t<b>[ {$_SERVER['CONTEXT_DOCUMENT_ROOT']} ]</b>");
    echo("<br/>Значение переменной [SCRIPT_FILENAME]". Chr(9). Chr(9). "<b>[ {$_SERVER['SCRIPT_FILENAME']} ]</b>");
    echo("</pre>");


    $indicesServer = array('PHP_SELF', 
    'argv', 
    'argc', 
    'GATEWAY_INTERFACE', 
    'SERVER_ADDR', 
    'SERVER_NAME', 
    'SERVER_SOFTWARE', 
    'SERVER_PROTOCOL', 
    'REQUEST_METHOD', 
    'REQUEST_TIME', 
    'REQUEST_TIME_FLOAT', 
    'QUERY_STRING', 
    'DOCUMENT_ROOT', 
    'HTTP_ACCEPT', 
    'HTTP_ACCEPT_CHARSET', 
    'HTTP_ACCEPT_ENCODING', 
    'HTTP_ACCEPT_LANGUAGE', 
    'HTTP_CONNECTION', 
    'HTTP_HOST', 
    'HTTP_REFERER', 
    'HTTP_USER_AGENT', 
    'HTTPS', 
    'REMOTE_ADDR', 
    'REMOTE_HOST', 
    'REMOTE_PORT', 
    'REMOTE_USER', 
    'REDIRECT_REMOTE_USER', 
    'SCRIPT_FILENAME', 
    'SERVER_ADMIN', 
    'SERVER_PORT', 
    'SERVER_SIGNATURE', 
    'PATH_TRANSLATED', 
    'SCRIPT_NAME', 
    'REQUEST_URI', 
    'PHP_AUTH_DIGEST', 
    'PHP_AUTH_USER', 
    'PHP_AUTH_PW', 
    'AUTH_TYPE', 
    'PATH_INFO', 
    'ORIG_PATH_INFO') ; 


    echo '<table border=1 cellpadding="10">' ; 
    foreach ($indicesServer as $arg) { 
        if (isset($_SERVER[$arg])) { 
            echo '<tr><td>'.$arg.'</td><td>' . $_SERVER[$arg] . '</td></tr>' ; 
        } 
        else { 
            echo '<tr><td>'.$arg.'</td><td>-</td></tr>' ; 
        } 
    } 
    echo '</table>' ; 
?>