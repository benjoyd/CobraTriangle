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
        public $config;
        public $request;
        public $data;
        public $db;
        public $views;
        public $session;


        /**
         * Constructor
         */
        protected function __construct() {
    $ct = CCobraTriangle::Instance();
    $this->config   = &$ct->config;
    $this->request  = &$ct->request;
    $this->data     = &$ct->data;
    $this->db       = &$ct->db;
    $this->views    = &$ct->views;
    $this->session  = &$ct->session;
  }


        /**
         * Redirect to another url and store the session
         */
        protected function RedirectTo($urlOrController=null, $method=null) {
    $ct = CCobraTriangle::Instance();
    if(isset($ct->config['debug']['db-num-queries']) && $ct->config['debug']['db-num-queries'] && isset($ct->db)) {
      $this->session->SetFlash('database_numQueries', $this->db->GetNumQueries());
    }    
    if(isset($ct->config['debug']['db-queries']) && $ct->config['debug']['db-queries'] && isset($ct->db)) {
      $this->session->SetFlash('database_queries', $this->db->GetQueries());
    }    
    if(isset($ct->config['debug']['timer']) && $ct->config['debug']['timer']) {
            $this->session->SetFlash('timer', $ct->timer);
    }    
    $this->session->StoreInSession();
    header('Location: ' . $this->request->CreateUrl($urlOrController, $method));
  }


        /**
         * Redirect to a method within the current controller. Defaults to index-method. Uses RedirectTo().
         *
         * @param string method name the method, default is index method.
         */
        protected function RedirectToController($method=null) {
    $this->RedirectTo($this->request->controller, $method);
  }


        /**
         * Redirect to a controller and method. Uses RedirectTo().
         *
         * @param string controller name the controller or null for current controller.
         * @param string method name the method, default is current method.
         */
        protected function RedirectToControllerMethod($controller=null, $method=null) {
          $controller = is_null($controller) ? $this->request->controller : null;
          $method = is_null($method) ? $this->request->method : null;          
    $this->RedirectTo($this->request->CreateUrl($controller, $method));
  }


}