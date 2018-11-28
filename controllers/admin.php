<?php 

class Admin extends Controller{
    
   
  
    
    protected function login(){
        
        $viewmodel = new AdminModel();
        $this->returnView($viewmodel->login(),true);
        
    }
    
    protected function logout(){
        
       unset($_SESSION['is_logged_in']);
       unset($_SESSION['user_data']);
       session_destroy();
        
        //redirect
        header('Location: '.ROOT_URL);
    }
}


?>