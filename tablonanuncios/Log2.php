
<?php
// función de gestión de errores









 
// función de gestión de errores
function myFunctionErrorHandler($errno, $errstr, $errfile, $errline)
{
    /* Según el típo de error, lo procesamos */
    switch ($errno) {
       case E_WARNING:
                echo "Hay un WARNING.<br />\n";
                echo "El warning es: ". $errstr ."<br />\n";
                echo "El fichero donde se ha producido el warning es: ". $errfile ."<br />\n";
                echo "La línea donde se ha producido el warning es: ". $errline ."<br />\n";
                /* No ejecutar el gestor de errores interno de PHP, hacemos que lo pueda procesar un try catch */
                return true;
                break;
            
            case E_NOTICE:
                echo "Hay un NOTICE:<br />\n";
                /* No ejecutar el gestor de errores interno de PHP, hacemos que lo pueda procesar un try catch */
                return true;
                break;
              case E_ERROR:
                echo "Hay un error:<br />\n";
                /* No ejecutar el gestor de errores interno de PHP, hacemos que lo pueda procesar un try catch */
                return true;
                break;
            default:
                /* Ejecuta el gestor de errores interno de PHP */
                return false;
                break;
            }
    }



