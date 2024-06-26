<?php
include_once 'lib/Session.php';
Session::init();
$login = Session::get("Custlogin");

if ($login == false) {
	header("Location: index.php");
}

?>
<?php include_once 'inc/header.php'; ?>
<?php


if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
	$cmrId = Session::get("cmrId");

	$insertOrder = $ct->orderProduct($cmrId);
	$delData = $ct->delCustomerCart();
	echo "<script>window.location = 'order.php';</script>";
}

?>
<style>
	.invoice-title h2,
	.invoice-title h3 {
		display: inline-block;
	}

	.table>tbody>tr>.no-line {
		border-top: none;
	}

	.table>thead>tr>.no-line {
		border-bottom: none;
	}

	.table>tbody>tr>.thick-line {
		border-top: 2px solid;
	}
</style>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<div class="invoice-title">
				<h2>Order Form</h2>
				<h3 class="pull-right"></h3>
			</div>
			<hr>
			<div class="row">
				<div class="col-xs-6">
					<address>
						<strong>Billed To:</strong><br>
						<?php
						$id = Session::get("cmrId");
						$getdata = $cmr->getCustomerData($id);
						if ($getdata) {
							while ($result = $getdata->fetch_assoc()) {
						?>
								<b>Name: </b><?php echo $result['name']; ?><br>
								<b>Name: </b><?php echo $result['phone']; ?><br>
								<b>Email: </b><?php echo $result['email']; ?><br>
								<b>Address: </b><?php echo $result['address']; ?><br>
								<b>City: </b><?php echo $result['city']; ?><br>
								<b>Zip: </b><?php echo $result['zip']; ?><br>
								<b>Country: </b><?php echo $result['country']; ?><br>

						<?php }
						} ?>
					</address>
				</div>
				<div class="col-xs-6 text-right mb-3">
					<a class="btn btn-success " href="editprofile.php">Change Address</a>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-6">
					<address>
						<strong>Payment Method:</strong><br>
						Cash On Delivery
					</address>
				</div>
				<div class="col-xs-6 text-right">
					<address>
						<strong>Order Date:</strong><br>
						<?php echo date("Y-m-d"); ?><br><br>
					</address>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title"><strong>Order summary</strong></h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-condensed">
							<thead>
								<tr>
									<td><strong>No</strong></td>
									<td class="text-center"><strong>Item</strong></td>
									<td class="text-center"><strong>Price</strong></td>
									<td class="text-center"><strong>Quantity</strong></td>
									<td class="text-right"><strong>Totals</strong></td>
								</tr>
							</thead>
							<tbody>
								<!-- foreach ($order->lineItems as $line) or some such thing here -->
								<?php
								$getPro = $ct->getCartProduct();
								if ($getPro) {
									$i = 0;
									$sum = 0;
									$qty = 0;
									while ($result = $getPro->fetch_assoc()) {
										$i++;
								?>
										<tr>
											<td><?php echo $i; ?></td>
											<td class="text-center"><?php echo $result['productName']; ?></td>
											<td class="text-center">Rp.<?php echo $result['price']; ?></td>
											<td class="text-center"><?php echo $result['quantity']; ?></td>
											<td class="text-right">Rp.<?php
																		$total = $result['price'] * $result['quantity'];
																		echo $total;
																		?></td>
										</tr>
										<?php
										$qty = $qty + $result['quantity'];
										$sum = $sum + $total;
										?>

								<?php }
								} ?>


								<tr>
									<td class="no-line"></td>
									<td class="no-line"></td>
									<td class="no-line"></td>
									<td class="no-line text-center"><strong>Quantity</strong></td>
									<td class="no-line text-right"><?php echo $qty; ?></td>
								</tr>
								<tr>
									<td class="no-line"></td>
									<td class="no-line"></td>
									<td class="no-line"></td>
									<td class="no-line text-center"><strong>Sub Total</strong></td>
									<td class="no-line text-right">Rp.<?php echo $sum; ?></td>
								</tr>
								<tr>
									<td class="no-line"></td>
									<td class="no-line"></td>
									<td class="no-line"></td>
									<td class="no-line text-center"><strong>Delivery Fees</strong></td>
									<td class="no-line text-right">Free</td>
								</tr>
								<tr>
									<td class="no-line"></td>
									<td class="no-line"></td>
									<td class="no-line"></td>
									<td class="no-line text-center"><strong>Total</strong></td>
									<td class="no-line text-right">
										<b>Rp.<?php
												$gtotal = $sum;
												echo $gtotal;
												?></b>
									</td>
								</tr>
							</tbody>
						</table>

						<div class="container mb-3">
							<div class="row text-center mt-5">
								<div class="col-lg-12">
									<div class="d-grid gap-2 d-md-flex justify-content-md-center">
										<a class="btn btn-danger btn-lg pull-right" href="?orderid=order">Order Now</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<hr>
<?php include_once 'inc/footer.php'; ?>