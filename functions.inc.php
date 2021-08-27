<?php

function get_safe_value($con,$arrray){
       if($array!=''){
               return mysqli_real_escape_string($con,$array);
                 }
}






?>