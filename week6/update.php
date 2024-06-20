<?php 
  include('reusable/conn.php'); 
  $id = $_GET['id'];
  $query = "SELECT * FROM schools WHERE `id` = '$id'";
  $school = mysqli_query($connect, $query);
  $result = $school -> fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ontario Public Schools</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <?php include('reusable/nav.php'); ?>
  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col">
          <h1 class="display-4 mt-5 mb-5">Update <?php echo $result['School Name'] ?></h1>
        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <form action="inc/updateSchool.php" method="POST">
            <input type="hidden" value="<?php echo $id ?>" name="id">
            <div class="mb-3">
              <label for="schoolName" class="form-label">School Name</label>
              <input type="text" class="form-control" id="schoolName" name="schoolName" aria-describedby="schoolName" value="<?php echo $result['School Name'] ?>">
            </div>
            <div class="mb-3">
              <label for="schoolLevel" class="form-label">School Level</label>
              <input type="text" class="form-control" id="schoolLevel" name="schoolLevel" value="<?php echo $result['School Level'] ?>">
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone</label>
              <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $result['Phone'] ?>"> 
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="<?php echo $result['Email'] ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="updateSchool">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>


</body>
</html>