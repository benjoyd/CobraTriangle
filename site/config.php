<?php
/**
 * Site configuration, this file is changed by user per site.
 *
 */

/**
 * Set level of error reporting
 */
error_reporting(-1);
ini_set('display_errors', 1);


/**
 * Set what to show as debug or developer information in the get_debug() theme helper.
 */
$ct->config['debug']['cobratriangle'] = false;
$ct->config['debug']['session'] = true;
$ct->config['debug']['timer'] = true;
$ct->config['debug']['db-num-queries'] = true;
$ct->config['debug']['db-queries'] = true;


/**
 * Set database(s).
 */
$ct->config['database'][0]['dsn'] = 'sqlite:' . COBRATRIANGLE_SITE_PATH . '/data/.ht.sqlite';


/**
 * What type of urls should be used?
 * 
 * default      = 0      => index.php/controller/method/arg1/arg2/arg3
 * clean        = 1      => controller/method/arg1/arg2/arg3
 * querystring  = 2      => index.php?q=controller/method/arg1/arg2/arg3
 */
$ct->config['url_type'] = 1;


/**
 * Set a base_url to use another than the default calculated
 */
$ct->config['base_url'] = null;


/**
 * Define session name
 */
$ct->config['session_name'] = preg_replace('/[:\.\/-_]/', '', $_SERVER["SERVER_NAME"]);
$ct->config['session_key']  = 'cobratriangle';

/**
 * Define server timezone
 */
$ct->config['timezone'] = 'Europe/Stockholm';


/**
 * Define internal character encoding
 */
$ct->config['character_encoding'] = 'UTF-8';


/**
 * Define language
 */
$ct->config['language'] = 'en';


/**
 * Define the controllers, their classname and enable/disable them.
 *
 * The array-key is matched against the url, for example: 
 * the url 'developer/dump' would instantiate the controller with the key "developer", that is 
 * CCDeveloper and call the method "dump" in that class. This process is managed in:
 * $ct->FrontControllerRoute();
 * which is called in the frontcontroller phase from index.php.
 */
$ct->config['controllers'] = array(
  'index'     => array('enabled' => true,'class' => 'CCIndex'),
  'developer' => array('enabled' => true,'class' => 'CCDeveloper'),
  'guestbook' => array('enabled' => true,'class' => 'CCGuestbook'),
);

/**
 * Settings for the theme.
 */
$ct->config['theme'] = array(
  // The name of the theme in the theme directory
  'name'    => 'core', 
);