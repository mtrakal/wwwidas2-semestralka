<?php
/**
 * Function __autoload is called automatically in PHP5 for find undefined classes
 */

/**
 * load automaticaly classes from files
 *
 * <p>This global function is called whenever you try to create an object of a class that hasn't been defined.
 * It takes just one parameter, which is the name of the class you have not defined.
 * If you define an object as being from a class that PHP does not recognise, PHP will run this function,
 * then try to re-create the object - you have a second chance to have the right class</p>
 * @param string $className Name of autoloaded class
 */
function __autoload($className) {
    try {
        $classPath[] = dirname(__FILE__) . '/classes/';
        $classPath[] = dirname(__FILE__) . '/../classes/';
        $classPath[] = dirname(__FILE__) . '/inc/';
        $classPath[] = dirname(__FILE__) . '/../inc/';

        foreach ($classPath as $classDir) {
            if (file_exists($classDir.$className.'.php')) {
                require_once($classDir.$className.'.php');
                break;
            }
        }
    }
    catch (Exception $e) {
        require_once "./classes/Exception.php";
        $error = new CException($e);
    }
}
?>
