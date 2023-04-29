<?php
include "db_conn.php";

// if(isset($_POST['submit'])){
//     $id = $_POST['userid'];
//     $first_name = $_POST['first_name'];
//     $last_name = $_POST['last_name'];
//     $email = $_POST['email'];
//     $gender = $_POST['gender'];
//     $files = $_FILES['file'];
    
//     $sql = "INSERT INTO `crud`(`id`, `first_name`, `last_name`, `email`, `gender`, `file`) VALUES (NULL,'$first_name','$last_name','$email','$gender','$files')";

//     $result = mysqli_query($conn, $sql);

//     if($result){
//         header("Location: index.php?msg=New record created successfully");
//     }
//     else{
//         echo "Failed" . mysqli_error($conn);
//     }   
// }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<!-- font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>PHP CRUD Application</title>
</head>
<body>
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">PHP Complete CRUD Application</nav>

    <!-- Add new user -->
<div class="container">
    <div class="text-center mb-4">
        <h3>Add New User</h3>
        <p class="text-muted">Complete the form below to add a new user</p>
    </div>

            <!-- form create -->
    <div class="container d-flex justify-content-center">
        <form action="upload.php" method="post" enctype="multipart/form-data" style="width:50vw; min-width:300px;">
    


               <!-- first name and last name  -->
        <div class="row mb-3">
        <div class="col">    
<label class="form-label">First Name:</label>
<input type="text" class="form-control" name="first_name" placeholder="Albert">
        </div>
        <div class="col">
<label class="form-label">Last Name:</label>
<input type="text" class="form-control" name="last_name" placeholder="Einstein">
        </div>
    </div>

            <!-- email -->
<div class="mb-3">
    <label class="form-label">Email:</label>
    <input type="email" class="form-control" name="email" placeholder="xyz@example.com">
</div>

            <!-- gender -->
<div class="form-group mb-3">
    <label>Gender:</label> &nbsp;
    <input type="radio" class="form-check-input" name="gender" id="male" value="male">
    <label for="male">Male</label>
    &nbsp;
    <input type="radio" class="form-check-input" name="gender" id="female" value="female">
    <label for="female">Female</label>
</div>

            <!-- profile pic -->
<div class="form-group mb-3">
    <label for="file" class="form-label">Profile Pic:</label>
    <input type="file" name="file" id="photo" class="form-control">
    <img src= "C:/xampp/htdocs/crud/upload" id="imgPreview" height="50px" width="50px">
    <input type="hidden" class="form-control" name="userid" value = "id">

</div>

            <!-- image preview  -->
        <!-- <div></div> -->

            <!-- save and cancel button -->
<div class="mb-3">
<input type="hidden" class="form-control" name="file" value = "file">

    <button type="submit" class="btn btn-success" name="submit">Save</button>
    <a href="index.php" class="btn btn-danger">Cancel</a>
</div>
</form></div>

</div>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
        </script>
<!-- <script type="text/javascript">
    function getImagePreview(event)
    {
        // var file = document.getElementById('file');
        // file.src = URL.createObjectURL(event.target.files[0]);

         image.src=URL.createObjectURL(event.target.files[0]);
        var imagediv = document.getElementById('preview');
        var newimg = document.createElement('img');
        imagediv.innerHTML = '';
        newimg.src = image;
        newimage.width = "100";
        imagediv.appendChild(newimg);

    } -->

    <script>
    $(document).ready(function(){
    console.log('dfgdf');
      $('#photo').change(function(){
        const file = this.files[0];
        console.log(file);
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
            console.log(event.target.result);
            $('#imgPreview').attr('src', event.target.result);
          }
          reader.readAsDataURL(file);
        }
      });
    });
    
</script>
</body>
</html>