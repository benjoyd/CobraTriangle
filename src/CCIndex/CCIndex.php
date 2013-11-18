<?php
/**
* Standard controller layout.
*
* @package CobraTriangleCore
*/
class CCIndex implements IController
{
/**
* Implementing interface IController. All controllers must have an index action.
*/
public function Index()
{   
global $ct;
$ct->data['title'] = "The Index Controller";
$ct->data['main'] = "<h1>The Index Controller</h1>";
}

}


