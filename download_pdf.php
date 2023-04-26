<?php
// Include the FPDF library
require_once('fpdf181/fpdf.php');

// Include the database connection file
require_once('db_connect.php');

// Check if the 'schedule_id' parameter was passed in the URL
if (!isset($_GET['schedule_id'])) {
  die('Schedule ID parameter missing.');
}

$schedule_id = $_GET['schedule_id'];

// Query the database for the schedule with the given ID
$query = "SELECT * FROM booked WHERE schedule_id = '$schedule_id' LIMIT 1";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 0) {
  die('Schedule not found.');
}

$row = mysqli_fetch_assoc($result);

// Get the status from the row

    $status = $row['status'];

if ($status == 0) {
    $new_status = 'Pending';
  } elseif ($status == 1) {
    $new_status = 'Confirmed';
  } elseif ($status == 2) {
    $new_status = 'Cancelled';
  } else {
    $new_status = 'Unknown';
  }


// Define the PDF class that will be used to generate the document
class PDF extends FPDF {
  // Header function - add the schedule ID as the document title
 // Header function - add the schedule ID as the document title and a logo image
function Header() {
    global $row;
  
    // Load the logo image from the assets directory
    $logo = 'assets/ticket.jpg';
  
    // Add the logo image to the header
    $this->Image($logo, 10, 10, 50);
  
    // Add a title to the header
    $this->SetFont('Arial', 'B', 14);
    $this->Cell(0, 10, 'Ticket No: ' . $row['schedule_id'], 0, 1, 'C');
  
    // Add space below the logo and title
    $this->Ln(30);
  }
  
  

  // Footer function - add a page number to the bottom of each page
  function Footer() {
    $this->SetY(-15);
    $this->SetFont('Arial', '', 8);
    $this->Cell(0, 10, 'Page ' . $this->PageNo() . ' of {nb}', 0, 0, 'C');
  }


  // Content function - add the schedule details to the PDF
  function Content() {
    global $row;
    global $new_status;

    $this->SetFont('Arial', '', 12);

    $this->Cell(50, 10, 'Reference Number:', 0);
    $this->Cell(0, 10, $row['ref_no'], 0, 1);

    $this->Cell(50, 10, 'Name:', 0);
    $this->Cell(0, 10, $row['name'], 0, 1);

    $this->Cell(50, 10, 'No of Seats:', 0);
    $this->Cell(0, 10, $row['qty'], 0, 1);

    $this->Cell(50, 10, 'Status:', 0);
    $this->Cell(0, 10, $new_status, 0, 1);

    $this->Cell(50, 10, 'Date Updated:', 0);
    $this->Cell(0, 10, $row['date_updated'], 0, 1);
  }
}

// Create a new PDF object and set the document properties
$pdf = new PDF();
$pdf->SetTitle('Bus Ticket No.' . $row['schedule_id']);
$pdf->SetAuthor('Bus Ticket Company');

// Add the schedule details to the PDF
$pdf->AddPage();
$pdf->Content();

// Output the PDF as a download
$pdf->Output('Schedule ' . $row['schedule_id'] . '.pdf', 'D');
?>