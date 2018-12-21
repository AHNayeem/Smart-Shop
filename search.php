<?php 
	if (empty($_GET['src_query'])) {
		header("location: index.php");
	}
?>
<?php include 'inc/header.php'; ?>
	<div class="container">
		<div class="row">
			<div class="product-section">
				<div class="animated fadeIn">
					<ul class="row list-unstyled">
						<?php 
							echo search();
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
<?php include 'inc/footer.php'; ?>