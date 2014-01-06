<?php
/**
 * Holding a instance of CCobraTriangle to enable use of $this in subclasses and provide some helpers.
 *
 * @package CobraTriangleCore
 */
class CObject {

        /**
         * Members
         */
        protected $ct;
        protected $config;
        protected $request;
        protected $data;
        protected $db;
        protected $views;
        protected $session;
        protected $user;


/**
* Constructor, can be instantiated by sending in the $ct reference.
*/
protected function __construct($ct=null) {
if(!$ct) {
$ct = CCobraTriangle::Instance();
} 
    $this->ct       = &$ct;
    $this->config   = &$ct->config;
    $this->request  = &$ct->request;
    $this->data     = &$ct->data;
    $this->db       = &$ct->db;
    $this->views    = &$ct->views;
    $this->session  = &$ct->session;
    $this->user     = &$ct->user;
        }



/**
* Wrapper for same method in CCobraTriangle. See there for documentation.
*/
protected function RedirectTo($urlOrController=null, $method=null, $arguments=null) {
  $this->ct->RedirectTo($urlOrController, $method, $arguments);
}


/**
* Wrapper for same method in CCobraTriangle. See there for documentation.
*/
protected function RedirectToController($method=null, $arguments=null) {
  $this->ct->RedirectToController($method, $arguments);
}


/**
* Wrapper for same method in CCobraTriangle. See there for documentation.
*/
protected function RedirectToControllerMethod($controller=null, $method=null, $arguments=null) {
  $this->ct->RedirectToControllerMethod($controller, $method, $arguments);
}


/**
* Wrapper for same method in CCobraTriangle. See there for documentation.
*/
protected function AddMessage($type, $message, $alternative=null) {
  return $this->ct->AddMessage($type, $message, $alternative);
}


/**
* Wrapper for same method in CCobraTriangle. See there for documentation.
*/
protected function CreateUrl($urlOrController=null, $method=null, $arguments=null) {
  return $this->ct->CreateUrl($urlOrController, $method, $arguments);
}


}
