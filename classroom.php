<?php
require_once "backend/app.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Classrooms</title>
</head>
<body>
<?php require_once("./navBar.php") ?>
    <div class="container ">
    <form action="" method="POST">
    <?php global $message; if ($message){?>
      <div class="position-absolute d-flex mt-2 w-100 justify-content-center ">
   <div class="<?php if($message["type"]==="success") echo 'bg-success'; else echo 'bg-danger'; ?>  message shadow  w-50 d-flex  ">
    <div class="py-2 px-2">
    <?php echo $message["text"] ?></div>
    
    <button type="submit" name="cancel" value="1" class="btn-close me-2 m-auto" aria-label="Close"> </button>
   
  </div>
  </div>
  <?php }?>
        <h1 class="text-center"> Classroom List</h1>
        <div class="d-flex  wraper-height-90">
        <div class="">
        <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title text-center">Add Classroom</h5>
    
    <div class="mb-2">
  <label for="exampleFormControlInput1" class="form-label">Classroom Name</label>
  <input type="text" name="classroom_name" class="form-control" id="exampleFormControlInput1" >
</div>

<button type="submit" name="add_class" value=1 class="btn btn-primary">Add class</button>

   
    
  </div>
</div>
        </div>
        <div class="flex-grow-1  student-list ">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Classroom Name</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
   <tbody>
   <?php 
    foreach($classrooms as $classroom){
    ?>
   <tr>
      <th scope="row"><?php echo $classroom["classroom_id"] ?></th>
      <td><?php echo $classroom["classroom_name"] ?></td>
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
    <li>
    <div class="">
     <button type='button' name='st_action' value='#class_<?php echo $classroom["classroom_id"] ?>' class='btn w-100 btn-primary' data-bs-toggle='modal' data-bs-target='#class_<?php echo $classroom["classroom_id"] ?>'>
  Edit
</button>
    </div></li>

    <li>
      <div class="">
      <button type="submit" name="delete_class" class='btn w-100 btn-danger' value="<?php echo $classroom["classroom_id"]?>">Delete</button>
      </div>
    </li>
  </ul>
</div>    
    </td>
    </tr>
    <?php } ?>
   </tbody>

        </table>

        <!-- Modal -->
        <?php 
    foreach($classrooms as $classroom){
    ?>
<div class="modal fade" id="class_<?php echo $classroom["classroom_id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Update Classroom</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <div class="mb-2">
     <label for='exampleFormControlInput1' class='form-label'>Classroom name</label>
  <input type='text' name="classroom_<?php echo $classroom["classroom_id"] ?>" value="<?php echo$classroom["classroom_name"]; ?>" class='form-control' id='exampleFormControlInput1' >

</div>
<button type="submit" name="update_class" value="<?php echo $classroom["classroom_id"] ?>" class="btn btn-primary">Update Class</button>

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