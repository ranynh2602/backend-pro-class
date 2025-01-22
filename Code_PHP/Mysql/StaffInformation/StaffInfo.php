<?php
include "./Config.php";
session_start();

if (isset($_SESSION['msg'])) {
	echo $_SESSION['msg'];
	session_unset();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Staff Table</title>
	<!-- DataTable CSS -->
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
	<div class="container">
		<!-- DataTable -->
		<div class="row mt-5">
			<h3 class="mb-3">Staff Information</h3>
			<table id="example" class="table table-striped" style="width:100%">
				<thead>
					<tr>
						<th>Code</th>
						<th>Name</th>
						<th>Gender</th>
						<th>Position</th>
						<th>Department</th>
						<th>Branch</th>
						<th>Date</th>
						<th>Photo</th>
					</tr>
				</thead>

				<tbody>
					<?php
					// Corrected SQL query to include gender
					$query = "SELECT e.code, e.empName, e.gender, p.posetion_name, d.depatment_name, e.branch, e.date, e.photo 
              FROM staff e
              JOIN tbl_posetion p ON e.code = p.code
              JOIN tbl_depatment d ON e.code = d.code";

					$result = $con->query($query);

					// Generate table rows dynamically
					while ($row = $result->fetch_assoc()) {
						// Conditional check: Only display rows where gender is Male
						if ($row['gender'] === 'Male') {
							echo "<tr>";
							echo "<td>" . htmlspecialchars($row['code']) . "</td>";
							echo "<td>" . htmlspecialchars($row['empName']) . "</td>";
							echo "<td>" . htmlspecialchars($row['gender']) . "</td>";
							echo "<td>" . htmlspecialchars($row['posetion_name']) . "</td>";
							echo "<td>" . htmlspecialchars($row['depatment_name']) . "</td>";
							echo "<td>" . htmlspecialchars($row['branch']) . "</td>";
							echo "<td>" . htmlspecialchars($row['date']) . "</td>";
							echo "<td><img src='uploads/" . htmlspecialchars($row['photo']) . "' alt='Photo' width='50'></td>";
							echo "</tr>";
						}
					}
					?>
				</tbody>


				<tfoot>
					<tr>
						<th>Code</th>
						<th>Name</th>
						<th>Gender</th>
						<th>Position</th>
						<th>Department</th>
						<th>Branch</th>
						<th>Date</th>
						<th>Photo</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</body>

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
	$(document).ready(function() {
		$('#example').DataTable({
			paging: true,
			searching: true,
			info: true,
			lengthChange: true // Enables "entries per page" dropdown
		});
	});
</script>

</html>