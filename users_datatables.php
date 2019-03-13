<?php 
	
	include "config.php";
	include "includes/header.php"; 
	include "includes/check_login.php";
	include "includes/nav.php";

?>

<section class="content-header">
  <h4>Users <small>Listing</small></h4>	    
  <ol class="breadcrumb">
  	<li><a href="index.php">Home</a></li>
  	<li><a href="users_datatables.php">Users DT</a></li>
  </ol>
</section>
<section class="content">
	<div class="box box-primary">
		<div class="box-body">
			<table class="table table-bordered table-striped" id="userDataTables">	
			    <thead>	
			        <tr>	
			            <th>Name</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Created</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</section>

<?php

include "includes/footer.php";

?>

<script>

$(document).ready(function() {
	$('#userDataTables').DataTable({
	});
} );

</script>