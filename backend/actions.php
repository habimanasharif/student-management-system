<?php
function  readFromJson(string $fileName):array{
  $students=[];
  if (file_exists($fileName)) {
    $json = file_get_contents($fileName);
    $students = json_decode($json, true);
}
return $students;
}

function addDataTojson(string $fileName, array $data,string $key):void{
  if(is_writable($fileName)){
    $students =json_decode(file_get_contents($fileName),true);
    $students[$key]=$data;
    if(!file_put_contents($fileName, json_encode($students))){
      echo "Cannot write to the file!";
  }
  }
}
function removeDataFromjson(string $fileName, string $key){
  if(is_writable($fileName)){
    $students =json_decode(file_get_contents($fileName),true);
    unset($students[$key]);
    if(!file_put_contents($fileName, json_encode($students))){
      echo "Cannot write to the file!";
  }
  }
}
function updateDataTojson(string $fileName, array $data,string $key):void{
  if(is_writable($fileName)){
    $students =json_decode(file_get_contents($fileName),true);
    $students[$key]=$data;
    if(!file_put_contents($fileName, json_encode($students))){
      echo "Cannot write to the file!";
  }
  }
}