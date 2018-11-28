<?php 

class Errors extends Controller{
    
    protected function Index(){
        $viewmodel = new ErrorsModel();
        $this->returnView($viewmodel->Index(),true);
    }
    
}


?>