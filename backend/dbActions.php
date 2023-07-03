<?php
function isRegNumberExists($array, $regNumber) {
  foreach ($array as $item) {
    if ($item['reg_number'] === $regNumber) {
      return true; 
    }
  }
  return false;
}

function  readData():array{
  global $conn;
  $students=[];
  $sql = "SELECT * FROM student";
  $result = $conn->query($sql);
  if($result && $result->num_rows>0){
    while($row = $result->fetch_assoc()){
        $students[]=$row;
    }
  }
  
return $students;
}
function  readClassroomData():array{
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

function addData(array $data,string $key):void{
  global $conn;
  global $message;
  $stmt = $conn->prepare("INSERT INTO student (reg_number, st_name, st_classroom, st_grade) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("sssi", $key,$data["st_name"], $data["st_classroom"],$data["st_grade"]);
  if ($stmt->execute()) {
    $message = [
      "type" => "success",
      "text" => "Student added successfully"
    ];
  }else{
    $message = [
      "type" => "error",
      "text" => "Student wasn't added please try again"
    ];
  }
  $stmt->close();
}
function removeData(string $key){
  global $conn;
  global $message;
  $stmt = $conn->prepare("DELETE FROM student WHERE reg_number = ?");
  $stmt->bind_param("s", $key);
  if ($stmt->execute()) {
    $message = [
      "type" => "success",
      "text" => "Student removed successfully"
    ];
  }else{
    $message = [
      "type" => "error",
      "text" => "Student wasn't removed successfully"
    ];
  }

}
function updateData(array $data,string $key):void{
  global $conn;
  global $message;
  $stmt = $conn->prepare("UPDATE student SET st_name = ?, st_classroom = ?, st_grade = ? WHERE reg_number = ?");
  $stmt->bind_param("ssis",$data["st_name"], $data["st_classroom"],$data["st_grade"],$key);
  if ($stmt->execute()) {
    $message = [
      "type" => "success",
      "text" => "Student updated successfully"
    ];
  }else{
    $message = [
      "type" => "error",
      "text" => "Student wasn't updated successfully"
    ];
  }
 
}