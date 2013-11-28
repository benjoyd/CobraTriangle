<?php
//
// PHASE: BOOTSTRAP
//
define('COBRATRIANGLE_INSTALL_PATH', dirname(__FILE__));
define('COBRATRIANGLE_SITE_PATH', COBRATRIANGLE_INSTALL_PATH . '/site');

require(COBRATRIANGLE_INSTALL_PATH.'/src/bootstrap.php');

$ct = CCobraTriangle::Instance();

//
// PHASE: FRONTCONTROLLER ROUTE
//
$ct->FrontControllerRoute();


//
// PHASE: THEME ENGINE RENDER
//
$ct->ThemeEngineRender();