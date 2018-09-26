<?php

class ChargeurDeClasses
{
    public function charger()
    {
        $dir = realpath(__DIR__);
        $classes = scandir($dir);
        if (is_array($classes)) {
            foreach ($classes as $class) {
                if (preg_match('/.php$/', $class)) {
                    $content = file_get_contents($dir . '/' . $class);
                    if(preg_match('/class '.preg_replace('/.php$/','',$class).'/',$content)){
                        require_once($dir . '/' . $class);
                    }
                }
            }
        }
    }

}