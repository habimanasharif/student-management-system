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

function addData(array $data,string $key):void{
  global $conn;
  $stmt = $conn->prepare("INSERT INTO student (reg_number, st_name, st_classroom, st_grade) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("sssi", $key,$data["st_name"], $data["st_classroom"],$data["st_grade"]);
  if ($stmt->execute()) {
   
  }else{
    echo "Failed";
  }
  $stmt->close();
}
function removeData(string $key){
  global $conn;
  $stmt = $conn->prepare("DELETE FROM student WHERE reg_number = ?");
  $stmt->bind_param("s", $key);
  if ($stmt->execute()) {

  }else{
    echo "Failed to delete student";
  }

}
function updateData(array $data,string $key):void{
  global $conn;
  $stmt = $conn->prepare("UPDATE student SET st_name = ?, st_classroom = ?, st_grade = ? WHERE reg_number = ?");
  $stmt->bind_param("ssis",$data["st_name"], $data["st_classroom"],$data["st_grade"],$key);
  if ($stmt->execute()) {

  }else{
    echo "Failed to update student";
  }
 
}