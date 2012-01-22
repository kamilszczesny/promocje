<?

function smarty_function_islogged() {
    echo('test');
    die();
    if (Zend_Auth::getInstance()->hasIdentity())  
        return true;
    else
        return false;
}