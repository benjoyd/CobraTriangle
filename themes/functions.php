<?php
/**
 * Helpers for theming, available for all themes in their template files and functions.php.
 * This file is included right before the themes own functions.php
 */
 

/**
 * Print debuginformation from the framework.
 */
function get_debug() {
  // Only if debug is wanted.
  $ct = CCobraTriangle::Instance();  
  if(empty($ct->config['debug'])) {
    return;
  }
  
  // Get the debug output
  $html = null;
  if(isset($ct->config['debug']['db-num-queries']) && $ct->config['debug']['db-num-queries'] && isset($ct->db)) {
    $flash = $ct->session->GetFlash('database_numQueries');
    $flash = $flash ? "$flash + " : null;
    $html .= "<p>Database made $flash" . $ct->db->GetNumQueries() . " queries.</p>";
  }    
  if(isset($ct->config['debug']['db-queries']) && $ct->config['debug']['db-queries'] && isset($ct->db)) {
    $flash = $ct->session->GetFlash('database_queries');
    $queries = $ct->db->GetQueries();
    if($flash) {
      $queries = array_merge($flash, $queries);
    }
    $html .= "<p>Database made the following queries.</p><pre>" . implode('<br/><br/>', $queries) . "</pre>";
  }    
  if(isset($ct->config['debug']['timer']) && $ct->config['debug']['timer']) {
    $html .= "<p>Page was loaded in " . round(microtime(true) - $ct->timer['first'], 5)*1000 . " msecs.</p>";
  }    
  if(isset($ct->config['debug']['cobratriangle']) && $ct->config['debug']['cobratriangle']) {
    $html .= "<hr><h3>Debuginformation</h3><p>The content of CCobraTriangle:</p><pre>" . htmlent(print_r($ct, true)) . "</pre>";
  }    
  if(isset($ct->config['debug']['session']) && $ct->config['debug']['session']) {
    $html .= "<hr><h3>SESSION</h3><p>The content of CCobraTriangle->session:</p><pre>" . htmlent(print_r($ct->session, true)) . "</pre>";
    $html .= "<p>The content of \$_SESSION:</p><pre>" . htmlent(print_r($_SESSION, true)) . "</pre>";
  }    
  return $html;
}


/**
 * Get messages stored in flash-session.
 */
function get_messages_from_session() {
  $messages = CCobraTriangle::Instance()->session->GetMessages();
  $html = null;
  if(!empty($messages)) {
    foreach($messages as $val) {
      $valid = array('info', 'notice', 'success', 'warning', 'error', 'alert');
      $class = (in_array($val['type'], $valid)) ? $val['type'] : 'info';
      $html .= "<div class='$class'>{$val['message']}</div>\n";
    }
  }
  return $html;
}


/**
 * Login menu. Creates a menu which reflects if user is logged in or not.
 */
function login_menu() {
  $ct = CCobraTriangle::Instance();
  if($ct->user['isAuthenticated']) {
    $items = "<a href='" . create_url('user/profile') . "'><img class='gravatar' src='" . get_gravatar(20) . "' alt=''> " . $ct->user['acronym'] . "</a> ";
    if($ct->user['hasRoleAdministrator']) {
      $items .= "<a href='" . create_url('acp') . "'>acp</a> ";
    }
    $items .= "<a href='" . create_url('user/logout') . "'>logout</a> ";
  } else {
    $items = "<a href='" . create_url('user/login') . "'>login</a> ";
  }
  return "<nav id='login-menu'>$items</nav>";
}


/**
 * Get a gravatar based on the user's email.
 */
function get_gravatar($size=null) {
  return 'http://www.gravatar.com/avatar/' . md5(strtolower(trim(CCobraTriangle::Instance()->user['email']))) . '.jpg?r=pg&amp;d=wavatar&amp;' . ($size ? "s=$size" : null);
}


/**
* Escape data to make it safe to write in the browser.
*/
function esc($str) {
  return htmlEnt($str);
}


/**
* Filter data according to a filter. Uses CMContent::Filter()
*
* @param $data string the data-string to filter.
* @param $filter string the filter to use.
* @returns string the filtered string.
*/
function filter_data($data, $filter) {
  return CMContent::Filter($data, $filter);
}


/**
* Display diff of time between now and a datetime. 
*
* @param $start datetime|string
* @returns string
*/
function time_diff($start) {
  return formatDateTimeDiff($start);
}


/**
 * Prepend the base_url.
 */
function base_url($url=null) {
  return CCobraTriangle::Instance()->request->base_url . trim($url, '/');
}


/**
 * Create a url to an internal resource.
 *
 * @param string the whole url or the controller. Leave empty for current controller.
 * @param string the method when specifying controller as first argument, else leave empty.
 * @param string the extra arguments to the method, leave empty if not using method.
 */
function create_url($urlOrController=null, $method=null, $arguments=null) {
  return CCObraTriangle::Instance()->request->CreateUrl($urlOrController, $method, $arguments);
}


/**
 * Prepend the theme_url, which is the url to the current theme directory.
 */
function theme_url($url) {
  $ct = CCobraTriangle::Instance();
  return "{$ct->request->base_url}themes/{$ct->config['theme']['name']}/{$url}";
}


/**
 * Return the current url.
 */
function current_url() {
  return CCobraTriangle::Instance()->request->current_url;
}


/**
 * Render all views.
 */
function render_views() {
  return CCobraTriangle::Instance()->views->Render();
}
