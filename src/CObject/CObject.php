<?php
/**
* Holding a instance of CCobraTriangle to enable use of $this in subclasses.
*
* @package CobraTriangleCore
*/
class CObject {

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
  protected function RedirectTo($url) {
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
    header('Location: ' . $this->request->CreateUrl($url));
  }

    }