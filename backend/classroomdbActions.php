<?php
function  readDataClassroom():array{
    global $conn;
    $classrooms=[];
    $sql = "SELECT * FROM classroom";
    $result = $conn->query($sql);
    if($result && $result->num_rows>0){
      while($row = $result->fetch_assoc()){
        $classrooms[]=$row;
      }
    }
    
  return $classrooms;
  }

  function addData(string $name):void{
    global $conn;
    global $message;
    $stmt = $conn->prepare("INSERT INTO classroom (classroom_name) VALUES (?)");
    $stmt->bind_param("s",$name);
    if ($stmt->execute()) {
      $message = [
        "type" => "success",
        "text" => "classroom added successfully"
      ];
    }else{
      $message = [
        "type" => "error",
        "text" => "classroom wasn't added please try again"
      ];
    }
    $stmt->close();
  }
  function removeData(string $key){
    global $conn;
    global $message;
    $stmt = $conn->prepare("DELETE FROM classroom WHERE classroom_id = ?");
    $stmt->bind_param("s", $key);
    if ($stmt->execute()) {
      $message = [
        "type" => "success",
        "text" => "Classroom removed successfully"
      ];
    }else{
      $message = [
        "type" => "error",
        "text" => "Classroom wasn't removed successfully"
      ];
    }
  
  }

  function updateData(string $data,string $key):void{
    global $conn;
    global $message;
    $stmt = $conn->prepare("UPDATE classroom SET classroom_name = ? WHERE classroom_id = ?");
    $stmt->bind_param("si",$data,$key);
    if ($stmt->execute()) {
      $message = [
        "type" => "success",
        "text" => "Classroom updated successfully"
      ];
    }else{
      $message = [
        "type" => "error",
        "text" => "Classroom wasn't updated successfully"
      ];
    }
   
  }