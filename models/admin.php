<?php

 class AdminModel extends Model{
     
     
     
     public function login(){
         
           //Sanitize POST
        
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
         $password = md5($post['password']);
         
        if($post['submit']){
            //Compare Loging
            
            $this->query('SELECT * FROM admin WHERE email = :email AND password = :password');
            
            $this->bind(':email', $post['email']);
            $this->bind(':password', $password);
            
            $row = $this->single();
            
            if($row){
                
                $_SESSION['is_logged_in'] = true;
                $_SESSION['user_data'] = array(
                
                     "id" => $row['id'],
                     "name" => $row['name'],
                    "email" => $row['email']
                
                );
                
                header('Location: '.ROOT_URL.'services');
                
            }else{
                
                Messages::setMsg('Incorrect Login', 'error');
            }
            
        }
        
        return;
         
         
     }
     
 }



?>