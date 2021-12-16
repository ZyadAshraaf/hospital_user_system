<?php 
    function testMessage($condition,$message){
        if($condition){
            echo "  <div class='alert alert-success w-50 mt-5 mx-auto' role='alert'>
                     $message !
                </div>";
        }
        else{
        echo "  <div class='alert alert-danger w-50 mt-5 mx-auto' role='alert'>
                    Not $message !
                </div>";
    }
}

?>