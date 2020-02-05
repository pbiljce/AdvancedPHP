<?php
    spl_autoload_register("my_autoloader");

    function my_autoloader($class){
        $parts = explode("\\",$class);
        require $parts[1] . ".class.php";
    }
?>
