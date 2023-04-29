<?php
include "db_conn.php";

if (isset($_POST['submit'])) {
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];
  $files = $_FILES['file'];

  $sql = "INSERT INTO `crud`(`id`, `first_name`, `last_name`, `email`, `gender`, `file`) VALUES (NULL,'$first_name','$last_name','$email','$gender', '$files')";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: index.php?msg=New record created successfully");
  } else {
    echo "Failed" . mysqli_error($conn);
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  <!-- font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
    integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>PHP CRUD Application</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">PHP Complete
    CRUD Application</nav>
  <?php
  if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    ' . $msg . '
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  ?>
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
          <th scope="col">Profile</th>
          <th scope="col">Action</th>

        </tr>
      </thead>
      <tbody>
        <?php
        include "db_conn.php";
        $sql = "SELECT * FROM `crud`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
          <th>
            <?php echo $row['id'] ?>
          </th>
          <th>
            <?php echo $row['first_name'] ?>
          </th>
          <th>
            <?php echo $row['last_name'] ?>
          </th>
          <th>
            <?php echo $row['email'] ?>
          </th>
          <th>
            <?php echo $row['gender'] ?>
          </th>
          <th><img src="upload/<?php echo $row['file']; ?>" height="50px" width="50px"></th>

          <td>

            <a href="edit.php?id=<?php echo $row['id'] ?>" class="link-dark"><i
                class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
            <a href="delete.php?id=<?php echo $row['id'] ?>" class="link-dark"><i
                class="fa-solid fa-trash fs-5"></i></a>
          </td>
        </tr>
        <?php
        }
        ?>




      </tbody>
    </table>
  </div>
  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
</body>

</html>