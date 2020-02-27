<?php 
class Logout extends Controller{
    
    function __construct()
    {
        parent::__construct();                
    }
    function render(){
        session_destroy();
        header('Location: '.URL);        
    }
    
    
}
?>