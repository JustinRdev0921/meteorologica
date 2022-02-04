<?php
    class LoginMessage extends Message 
    {
        public function getMessage($message){
            $message = strip_tags($message);    
            return "<div class='alert alert-info' role='alert'><p class='text-center m-0 p-0'><i class='fas fa-exclamation-circle'></i> $message</div></p>";
        }
    }
    
?>