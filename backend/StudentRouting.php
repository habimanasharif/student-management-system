<?php
global $$system_Type;
 if(isset($_POST)){
    if(filter_input(INPUT_POST, "add_student")&& filter_input(INPUT_POST, "add_student")==1){
      if($system_Type==="database"){
        $st_number=count(readData())+1;
      }
      else{
     $st_number=count(readFromJson("data.json"))+1;
     }
     $student=[
       "reg_number"=>"st_".$st_number,
       "st_name"=>filter_input(INPUT_POST, 'st_name'),
       "st_classroom"=>filter_input(INPUT_POST, 'st_classroom'),
       "st_grade"=>filter_input(INPUT_POST, 'st_grade'),
     ];
     if(filter_input(INPUT_POST, 'st_name')&&filter_input(INPUT_POST, 'st_classroom')&&filter_input(INPUT_POST, 'st_grade')){
      if($system_Type==="database"){
        addData($student,"st_$st_number");
      }else{
        addDataTojson("data.json",$student,"st_$st_number");
      }
     
   }
    }else if(filter_input(INPUT_POST, "delete_student")){
      if($system_Type==="database" && isRegNumberExists(readData(), filter_input(INPUT_POST, "delete_student"))){
        $st_reg=filter_input(INPUT_POST, "delete_student");
        removeData($st_reg);
      }else if(array_key_exists( filter_input(INPUT_POST, "delete_student"),readFromJson("data.json"))){
        $st_reg=$_POST["delete_student"];
        removeDataFromjson("data.json",$st_reg);
      }else{
        echo "Invalid Request";
      }
     
    }else if(filter_input(INPUT_POST, "update_student")){
     $st_reg= filter_input(INPUT_POST, "update_student");
     $student=[
       "reg_number"=>$st_reg,
       "st_name"=> filter_input(INPUT_POST, "updated_name_$st_reg"),
       "st_classroom"=>filter_input(INPUT_POST, "updated_class_$st_reg"),
       "st_grade"=>filter_input(INPUT_POST, "updated_grade_$st_reg"),
     ];
     if($system_Type==="database" && isRegNumberExists(readData(), filter_input(INPUT_POST, "update_student"))){
      updateData($student,$st_reg);
     }elseif(array_key_exists( filter_input(INPUT_POST, "update_student"),readFromJson("data.json"))){
      updateDataTojson("data.json",$student,$st_reg);
     }else{
      echo "Invalid Request";
    }
   
     
    }elseif(isset($_POST["cancel"])){
      global $message;
      $message=[];
    }
   
   
   }