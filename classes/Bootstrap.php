<?php

 class Bootstrap{
     
     private $controller;
     private $action;
     private $request;
     
     public function __construct($request)
     {
         $this->request = $request;
         
         if($this->request['controller'] == "")
         {
             $this->controller = 'home';
         }
         else 
         {
             $this->controller = $this->request['controller'];
         }
         
         if($this->request['action']=="")
         {
             $this->action = 'index';
         }
         else
         {
             $this->action = $this->request['action'];
         }
         
         //echo $this->controller;
     }
     
     
     public function createController(){
         // Check Class
         if(class_exists($this->controller)){
             $parents = class_parents($this->controller);
             //Check Extend
             if( in_array("Controller", $parents)){
                 if(method_exists($this->controller, $this->action)){
                     
                     return new $this->controller($this->action, $this->request);
                     
                 }else{
                     //Method Does Not Exist
                      //Messages::setMsg('Method Does Not Exist', 'error');
                
                     header('Location: '.ROOT_URL.'errors');
                 }
                 
             }else{
                 
                 //Base Controller Does Not Exist
                      //Messages::setMsg('Controller Does Not Exist', 'error');
                header('Location: '.ROOT_URL.'errors');
             }
         }
         else
         {
             //Controller Class Does Not Exist
                     // Messages::setMsg('Controller Class Not Found', 'error');
                header('Location: '.ROOT_URL.'errors');
         }
     }
 }

?>