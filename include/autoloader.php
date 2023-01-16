<?php

spl_autoload_register('myAutoLoaderFn');


function myAutoLoaderFn($class)
{
 $path = '../../';
 $extention = '.php';
 $full_path = $path . $class . $extention;
 if (!file_exists($full_path)) {
  return false;
 }
 include_once($full_path);
}