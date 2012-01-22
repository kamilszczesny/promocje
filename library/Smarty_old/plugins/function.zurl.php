<?
function smarty_function_zurl($params, &$smarty) {
    // Defaults as specified by assemble()
    $urlParams = array();
    $name = null;
    $reset = false;
    $encode = true;

    // Capture the module
    if (isset($params['module'])) {
        $urlParams['module'] = $params['module'];
        unset($params['module']);
    }

    // Capture the controller
    if (isset($params['controller'])) {
        $urlParams['controller'] = $params['controller'];
        unset($params['controller']);
    }

    // Capture the action
    if (isset($params['action'])) {
        $urlParams['action'] = $params['action'];
        unset($params['action']);
    }
    
    

    // Capture if a route name is specified
    if (isset($params['zend_url_name'])) {
        print_r ($params['zend_url_name']);
        $name = $params['zend_url_name'];
        unset($params['zend_url_name']);
    }

    // Capture if resetting the route is specified
//    if (isset($params['zend_url_reset'])) {
//        $reset = $params['zend_url_reset'] == "true"
//        ? true
//        : false;
//        unset($params['zend_url_reset']);
//    }
    $reset = true;

    // Capture if encoding parameters is specified
    if (isset($params['zend_url_encode'])) {
        $encode = $params['zend_url_encode'] == "false"
            ? false
            : true;
        unset($params['zend_url_encode']);
    }

    // Grab rest of the params and add them to urlParams
    foreach ( $params as $key => $val ) {
        $urlParams[ $key ] = $val;
        unset( $params[ $key ] );
    }

    // Assemble the url and pass it back

    return Zend_Controller_Front::getInstance()
        ->getRouter()->assemble(
            $urlParams,
            $name,
            $reset,
            $encode );
}