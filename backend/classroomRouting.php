<?php
if(isset($_POST)){
    if(filter_input(INPUT_POST, "add_class")&& filter_input(INPUT_POST, "add_class")==1){
        if(filter_input(INPUT_POST, "classroom_name")){
            addData(filter_input(INPUT_POST, 'classroom_name'));
        }
    }else if(filter_input(INPUT_POST, "delete_class")){
        removeData(filter_input(INPUT_POST, "delete_class"));
    }else if(filter_input(INPUT_POST, "update_class")){
       $id=filter_input(INPUT_POST, "update_class");
       updateData(filter_input(INPUT_POST, "classroom_$id"),$id);
    }
}