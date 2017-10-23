<?php
/**
 * Created by PhpStorm.
 * User: apple
 * Date: 10/22/17
 * Time: 06:03
 */

 foreach($data as $value){
    echo  '<option value="'.$value->id.'">'.$value->name.'</option>';
}


?>