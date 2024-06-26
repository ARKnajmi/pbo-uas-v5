<?php
include_once 'lib/Session.php';
Session::init();
$login = Session::get("Custlogin");
if ($login == false) {
	header("Location: index.php");
}
?>
<?php include_once 'inc/header.php'; ?>




<!-- Page Features -->
<div class="container mt-5">
	<div class="row justify-content-center">
		<div class="col-lg-8">
			<?php
			$id = Session::get("cmrId");
			$getdata = $cmr->getCustomerData($id);
			if ($getdata) {
				while ($result = $getdata->fetch_assoc()) {
			?>
					<div class="card">
						<div class="card-header text-center">
							<h2>User Profile Details</h2>
						</div>
						<div class="card-body">
							<table class="table">
								<tr>
									<td width="20%">Name</td>
									<td width="5%">:</td>
									<td><?php echo $result['name']; ?></td>
								</tr>
								<tr>
									<td>Phone</td>
									<td>:</td>
									<td><?php echo $result['phone']; ?></td>
								</tr>
								<tr>
									<td>Email</td>
									<td>:</td>
									<td><?php echo $result['email']; ?></td>
								</tr>
								<tr>
									<td>Address</td>
									<td>:</td>
									<td><?php echo $result['address']; ?></td>
								</tr>
								<tr>
									<td>City</td>
									<td>:</td>
									<td><?php echo $result['city']; ?></td>
								</tr>
								<tr>
									<td>Zipcode</td>
									<td>:</td>
									<td><?php echo $result['zip']; ?></td>
								</tr>
								<tr>
									<td>Country</td>
									<td>:</td>
									<td><?php echo $result['country']; ?></td>
								</tr>
							</table>
							<div class="text-center mt-3">
								<a href="editprofile.php" class="btn btn-primary">Update Your Profile Here</a>
							</div>
							<div class="text-center mt-3">
								<h3>Please Watch Our Other Products <a href="products.php">Here</a></h3>
							</div>
						</div>
					</div>
			<?php
				}
			}
			?>
		</div>
	</div>
</div>

<!-- /.row -->

<hr>

<?php include_once 'inc/footer.php'; ?>