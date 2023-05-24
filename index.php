<?php
$st_number=1;
$students=[];
  if(!empty($_POST["exist_reg_number"])){
    foreach($_POST["exist_reg_number"] as $key=> $reg_num){
      $student=[
        "reg_number"=>$reg_num,
        "st_name"=>$_POST["exist_st_name"][$key],
        "st_classroom"=>$_POST["exist_st_classroom"][$key],
        "st_grade"=>$_POST["exist_st_grade"][$key],
      ];
      $students[$reg_num]=$student;
      $st_number++;
    }
  }
  print_r($_POST);

 if(isset($_POST)){
 if(isset($_POST["add_student"])&& $_POST["add_student"]==1){
  
  $student=[
    "reg_number"=>"st_".$st_number,
    "st_name"=>$_POST["st_name"],
    "st_classroom"=>$_POST["st_classroom"],
    "st_grade"=>$_POST["st_grade"],
  ];
  $students["st_$st_number"]=$student;

 }else if(isset($_POST["delete_student"])&& array_key_exists( $_POST["delete_student"],$students)){
  $st_reg=$_POST["delete_student"];
   unset($students[$st_reg]);
 }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student-management-system</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container ">
    <form action="" method="POST">
        <h1 class="text-center">Student Mangement System</h1>
        <div class="d-flex  wraper-height-90">
        <div class="">
        <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title text-center">Add Student</h5>
    
    <div class="mb-2">
  <label for="exampleFormControlInput1" class="form-label">Student Name</label>
  <input type="text" name="st_name" class="form-control" id="exampleFormControlInput1" >
</div>
<div class="mb-2">
  <label for="exampleFormControlInput1" class="form-label">Student Class</label>
  <select name="st_classroom" class="form-select">
        <option> Class A</option>
        <option> Class B</option>
        <option> Class C</option>
        <option> Class D</option>
      </select>
</div>
<div class="mb-2">
  <label for="exampleFormControlInput1" class="form-label">Grade</label>
  <input type="number" name="st_grade" class="form-control" id="exampleFormControlInput1" max="10" min="0">
</div>
<!-- <input type="hidden" name="st_array" value=<?php echo json_encode($students);?>/> -->
<?php
 foreach ($students as $reg_num=>$student){
  $st_reg=$student["reg_number"];
  $st_name=$student["st_name"];
  $st_classroom=$student["st_classroom"];
  $st_grade=$student["st_grade"];
  echo "<input type=\"hidden\" name=\"exist_reg_number[]\" value=\"$st_reg\"/>";
  echo "<input type=\"hidden\" name=\"exist_st_name[]\" value=\"$st_name\"/>";
  echo "<input type=\"hidden\" name=\"exist_st_classroom[]\" value=\"$st_classroom\"/>";
  echo "<input type=\"hidden\" name=\"exist_st_grade[]\" value=\"$st_grade\"/>";
 }
?>

<button type="submit" name="add_student" value=1 class="btn btn-primary">Add Student</button>

   
    
  </div>
</div>
        </div>
        <div class="flex-grow-1  student-list">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Student Name</th>
      <th scope="col"> Student Class</th>
      <th scope="col">Student Grade</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    
    
    
    <?php 
    foreach($students as $student){
    ?>
       <tr>
      <th scope="row"><?php echo explode("_",$student["reg_number"])[1]?></th>
      <td><?php echo $student["st_name"]?></td>
      <td><?php echo $student["st_classroom"]?></td>
      <td><?php echo $student["st_grade"]?></td>
      <td>
      <div class="dropdown">
  <button class="btn "  type="button" id="ellipsisDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <div class="d-flex flex-column">
         <div class="dot"></div>
         <div class="dot"></div>
         <div class="dot"></div>
      </div>
  </button>
  <ul class="dropdown-menu" aria-labelledby="ellipsisDropdown">
    <li><a class="dropdown-item" href="#"><!-- Button trigger modal -->
      <?php 
      $array_st="#".str_replace(' ','-',$student["st_name"]);
      echo "<button type='button' name='st_action' value='$array_st' class='btn w-100' data-bs-toggle='modal' data-bs-target='$array_st'> "
      ?>
  Edit
</button>
</a></li>

    <li>
      <button type="submit" name="delete_student" value="<?php echo $student["reg_number"]?>">Delete</button>
    </li>
  </ul>
</div>    
    </td>
    </tr>
     <?php }?>   
  </tbody>
</table>

<?php  foreach($students as $student){?>
<!-- Modal -->
<div class="modal fade" id=<?php echo  str_replace(' ','-',$student["st_name"])?> tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Update Student</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="">
    <div class="mb-2">
     <label for='exampleFormControlInput1' class='form-label'>Student Name</label>
  <input type='text' value="<?php echo htmlspecialchars($student["st_name"])?>" class='form-control' id='exampleFormControlInput1' >

</div>
<div class="mb-2">
  <label for="exampleFormControlInput1" class="form-label">Student Class</label>
      <select  class="form-select">
        <option <?php if($student['st_classroom']== 'Class A'){echo "selected";} ?>  > Class A</option>
        <option <?php if($student['st_classroom']== 'Class B'){echo "selected";} ?> > Class B </option>
        <option <?php if($student['st_classroom']== 'Class C'){echo "selected";} ?>  > Class C</option>
        <option <?php  if($student['st_classroom']== 'Class D'){echo "selected";} ?> > Class D</option>
      </select>
</div>
<div class="mb-2">
  <label for="exampleFormControlInput1" class="form-label">Grade</label>
  <input type="number" value=<?php echo $student["st_grade"] ?> class="form-control" id="exampleFormControlInput1" max="10" min="0">
</div>

<button type="submit" class="btn btn-primary">Update Student</button>

    </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>
        </div>
        </div>
        </form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>