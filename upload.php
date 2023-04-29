
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
    
    <div class="container">
    <a href="add_new.php" class="btn btn-dark mb-3">Add New</a>

    <table class="table table-hover text-center">
  <thead class="table-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Email</th>
      <th scope="col">Gender</th>
      <th scope="col">Profilddddddddde</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    include "db_conn.php";

$id = $_GET['id']??"";

    if(isset($_POST['submit'])){
        // print_r($_POST);
        // die;
        // print_r($_FILES);
        // die;
        $id = $_POST['userid'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $files = $_FILES['file']['name'];

        // $filename = $files['name'];
        // added
        $allowed_extension = array('png', 'jpg', 'jpeg');
        $file_extension = pathinfo($files, PATHINFO_EXTENSION);
        $randomno = rand(0,100000);
        $rename = date('Ymd').$randomno;


        $newname = $rename.'.'.$file_extension;
// 
        // $fileerror = $files['error'];
        // $filetmp = $files['tmp_name'];
        

        // $fileext = explode('.',$filename);
        // $filecheck = strtolower(end($fileext));
        
        if(in_array($file_extension, $allowed_extension)){
            // echo 'fdgd';
          
            // $destinationfile = 'upload/'.$newname;
            $test = move_uploaded_file($_FILES['file']['tmp_name'], 'upload/'.$newname);
            // print_r($test);
            // die;

            $sql = "INSERT INTO `crud`(`id`, `first_name`, `last_name`, `email`, `gender`, `file`) VALUES (NULL,'$first_name','$last_name','$email','$gender','$newname')";
        
            $result = mysqli_query($conn , $sql);
          if($result){
            // move_uploaded_file($FILES['file']['tmp_name'], 'upload/'.$newname);
            header("Location: index.php?msg=Newrecordcreatedsuccessfully");
            exit(0);
          }
          else{
            echo "Failed" . mysqli_error($conn);
        } 
        
          

    $displayquery = "SELECT * FROM `crud` WHERE id = $id LIMIT 1";
            $querydisplay = mysqli_query($conn , $displayquery);

            // while($row = mysqli_fetch_array($querydisplay)){
              while($row = mysqli_fetch_assoc($querydisplay)){
                ?>
         <tr>
              <th><?php echo $row['id']?></th>
              <th><?php echo $row['first_name']; ?></th>
              <th><?php echo $row['last_name']; ?></th>
              <th><?php echo $row['email']; ?></th>
              <th><?php echo $row['gender']; ?></th>
              <th>
                <div>
                <img src= "<?php echo $row['file']; ?>"  height="50px" width="50px">
                </div>
              </th>

              <td>

<a href="edit.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
<a href="delete.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
</td>
            </tr>
                 <?php
            }
            

} 

} 
 

//  <div class="form-group mb-3">
//     <label for="file" class="form-label">Profile Pic:</label>
//     <input type="file" name="file" id="photo" class="form-control">
//     <img src= "C:/xampp/htdocs/crud/upload" id="imgPreview" height="50px" width="50px">
//     <input type="hidden" class="form-control" name="userid" value = "id">

// </div>
   
    ?>
  </tbody>
</table>
</div>


    <!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


<!-- <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
        </script>

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
    
</script> -->
</body>
</html>