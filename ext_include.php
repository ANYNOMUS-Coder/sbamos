<?php
define("RUNNING_SCRIPT", true);
include ('config.php');

$generalObj = new general;

//For all Class Include
$modulesClass = $generalObj -> getModuleIdentityForClass("parentModuleId='0'",0,999);
foreach($modulesClass as $cmv){
    if(file_exists($ROOT_PATH.'/modules/'.$cmv['nameForDeveloper'].'/class/included_class.php'))
        include ($ROOT_PATH.'/modules/'.$cmv['nameForDeveloper'].'/class/included_class.php');
}
//For all Class Include

//For all Function Include
$modulesClass = $generalObj -> getModuleIdentityForClass("parentModuleId='0'",0,999);
foreach($modulesClass as $cmv){
    if(file_exists($ROOT_PATH.'/modules/'.$cmv['nameForDeveloper'].'/function/included_function.php'))
        include ($ROOT_PATH.'/modules/'.$cmv['nameForDeveloper'].'/function/included_function.php');
}
//For all Function Include