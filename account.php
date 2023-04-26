<?php 
// start session and check if user is logged in
session_start();
if (!isset($_SESSION['user_id'])) {
  // redirect to login page if user is not logged in
  header('Location: login.php');
  exit();
}

// include external db connection file
include 'db_connect.php';

// get logged in user id
$user_id = $_SESSION['user_id'];

// query database for rows with matching user_id
$sql = "SELECT schedule_id, ref_no, name, qty, status, date_updated FROM booked WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Booked Data</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <?php include('header.php'); ?>
<?php include('navbar.php'); ?>


  <div class="container my-5">
    <h1 class="mb-4">Booked data</h1>

    <?php if (mysqli_num_rows($result) > 0) { ?>
      <table class="table table-striped table-hover">
        <thead class="thead-dark">
          <tr>
            <th>Schedule ID</th>
            <th>Ref No</th>
            <th>Name</th>
            <th>Qty</th>
            <th>Status</th>
            <th>Date Updated</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
<?php



        
$status = $row['status'];

if ($status == 0) {
  $new_status = 'Pending';
} elseif ($status == 1) {
  $new_status = 'Confirmed';
}
?>

            <tr>
              <td><?php echo $row['schedule_id']; ?></td>
              <td><?php echo $row['ref_no']; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['qty']; ?></td>
              <td><?php echo $new_status; ?></td>
              <td><?php echo $row['date_updated']; ?></td>
              <td>
               
                
              <?php if ($status == 0) { ?>
              <a href="mpesa.php"  class="btn btn-warning btn-sm">Make Payment</a>
               <?php } ?>
               <?php if ($status == 1) { ?>
                <a href='download_pdf.php?schedule_id=<?php echo $row['schedule_id']; ?>' class="btn btn-primary btn-sm">Download Ticket</a>
                <?php } ?>

            
            </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } else { ?>
      <p>No data found.</p>
    <?php } ?>

  </div>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>

<?php 
// close database connection
mysqli_close($conn);
?>
