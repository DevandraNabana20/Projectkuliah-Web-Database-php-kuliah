<?php
session_start();
if ($_SESSION['status'] != "login") {
  header("location:http://localhost/project2/View/login.php?pesan=belum_login");
}
?>

<!DOCTYPE html>
<html lang="en">
<?php
include '../../include/header.php';
?>
<?php require_once "../../config/koneksi.php";
$con = db_connect(); ?>

<body class="sb-nav-fixed">
  <?php
  include '../../include/navbar.php';
  ?>
  <div id="layoutSidenav">
    <?php
    include '../../include/side.php';
    ?>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-4">
          <h1 class="mt-4">MovieDetail</h1>
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Add data</li>
          </ol>
          <div class="card mb-4">
            <div class="card-header">
              <i class="fas fa-table me-1"></i>
              DataTable
            </div>
            <div class="card-body">
              <form onsubmit="return validateFile(event)" action="../../../Controller/cr_createmoviedetail.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="image-upload" class="form-label">movieImage</label>
                  <input type="file" accept="image/png,image/jpeg" required class="form-control" id="image-upload" name="movieImage">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">movieName</label>
                  <input name="movieName" required type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">movieRelease</label>
                  <div class="input-group date" id="datepicker1">
                    <input type="text" required class="form-control" id="exampleInputPassword1" name="movieRelease">
                    <span class="input-group-append">
                      <span class="input-group-text bg-white d-block">
                        <i class="fa fa-calendar"></i>
                      </span>
                    </span>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">movieLink</label>
                  <textarea class="form-control" required name="movieLink" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">movieProduction</label>
                  <input name="movieProduction" required type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">movieMinutes</label>
                  <input name="movieMinutes" required type="text" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                  <label for="exampleInputPassword1" class="form-label">movieDesc</label>
                  <textarea class="form-control" required name="movieDesc" id="" cols="30" rows="10"></textarea>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">movieRate</label>
                    <input max="10" min="1" name="movieRate" required type="number" step="any" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">movieDirector</label>
                    <input name="movieDirector" required type="text" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">movieActors</label>
                    <input name="movieActors" required type="text" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">counter</label>
                    <input name="counter" readonly value="0" required min="0" type="number" class="form-control" id="exampleInputPassword1">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">adminCode</label>
                    <?php
                    $username = $_SESSION['username'];
                    $admindata = mysqli_query($con, "select adminCode from admin where adminUsername = '$username'");
                    $result12 = mysqli_fetch_assoc($admindata);
                    ?>
                    <input name="adminCode" readonly value="<?php echo $result12['adminCode']; ?>" required type="text" class="form-control" id="exampleInputPassword1">
                  </div>
                </div>
                <center>
                  <button type="submit" class="btn btn-success">Add data</button>
                </center>
              </form>
            </div>
          </div>
        </div>
      </main>
      <?php
      include '../../include/footer.php';
      ?>
    </div>
  </div>
  <?php
  include '../../include/script.php';
  ?>
  <script type="text/javascript">
    $('#datepicker1').datepicker({
      format: 'yyyy',
      minViewMode: 'years',
      endDate: '+0y',
      keyboardNavigation: false,
      autoclose: true,
      timezone: 'UTC+07:00'
    });
    $(document).ready(function() {
      $('#datepicker').datepicker();
    });
  </script>
</body>

</html>