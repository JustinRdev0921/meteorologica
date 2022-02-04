<?php
    class SuccessMessage extends Message 
    {
        public function getMessage($message){
            $message = strip_tags($message);
            return "<div class='alert alert-success' role='alert'><p class='text-center m-0 p-0'>$message <i class='fas fa-check-circle'></i></div></p>";
        }
    }
    

?>