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
        <h1 class="text-center">Student Mangement System</h1>
        <div class="d-flex  wraper-height-90">
        <div class="">
        <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title text-center">Add Student</h5>
    <form action="">
    <div class="mb-2">
  <label for="exampleFormControlInput1" class="form-label">Student Name</label>
  <input type="text" class="form-control" id="exampleFormControlInput1" >
</div>
<div class="mb-2">
  <label for="exampleFormControlInput1" class="form-label">Student Class</label>
  <select  class="form-select">
        <option> Class A</option>
        <option> Class B</option>
        <option> Class C</option>
        <option> Class D</option>
      </select>
</div>
<div class="mb-2">
  <label for="exampleFormControlInput1" class="form-label">Grade</label>
  <input type="number" class="form-control" id="exampleFormControlInput1" max="10" min="0">
</div>

<button type="submit" class="btn btn-primary">Add Student</button>

    </form>
    
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
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>
      <div class="dropdown">
  <button class="btn " type="button" id="ellipsisDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <div class="d-flex flex-column">
         <div class="dot"></div>
         <div class="dot"></div>
         <div class="dot"></div>
      </div>
  </button>
  <ul class="dropdown-menu" aria-labelledby="ellipsisDropdown">
    <li><a class="dropdown-item" href="#">Edit</a></li>
    <li><a class="dropdown-item" href="#">Done</a></li>
    <li><a class="dropdown-item" href="#">Delete</a></li>
  </ul>
</div>
    </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>
      <div class="dropdown">
  <button class="btn " type="button" id="ellipsisDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <div class="d-flex flex-column">
         <div class="dot"></div>
         <div class="dot"></div>
         <div class="dot"></div>
      </div>
  </button>
  <ul class="dropdown-menu" aria-labelledby="ellipsisDropdown">
    <li><a class="dropdown-item" href="#">Edit</a></li>
    <li><a class="dropdown-item" href="#">Done</a></li>
    <li><a class="dropdown-item" href="#">Delete</a></li>
  </ul>
</div>
        </td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>
      <div class="dropdown">
  <button class="btn " type="button" id="ellipsisDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  <div class="d-flex flex-column">
         <div class="dot"></div>
         <div class="dot"></div>
         <div class="dot"></div>
      </div>
  </button>
  <ul class="dropdown-menu" aria-labelledby="ellipsisDropdown">
    <li><a class="dropdown-item" href="#"><!-- Button trigger modal -->
<button type="button" class="btn w-100" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Edit
</button>
</a></li>

    <li><a class="dropdown-item" href="#">Delete</a></li>
  </ul>
</div>    
    </td>
    </tr>
    
  </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">Update Student</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="">
    <div class="mb-2">
  <label for="exampleFormControlInput1" class="form-label">Student Name</label>
  <input type="text" value="Mark Otto" class="form-control" id="exampleFormControlInput1" >
</div>
<div class="mb-2">
  <label for="exampleFormControlInput1" class="form-label">Student Class</label>
  <select  class="form-select">
        <option> Class A</option>
        <option selected> Class B</option>
        <option> Class C</option>
        <option> Class D</option>
      </select>
</div>
<div class="mb-2">
  <label for="exampleFormControlInput1" class="form-label">Grade</label>
  <input type="number" value="10" class="form-control" id="exampleFormControlInput1" max="10" min="0">
</div>

<button type="submit" class="btn btn-primary">Update Student</button>

    </form>
      </div>
    </div>
  </div>
</div>
        </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>