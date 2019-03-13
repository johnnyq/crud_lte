<?php 
	
	include "config.php";
	include "includes/header.php"; 
	include "includes/check_login.php";
	include "includes/nav.php";

?>
<section class="content-header">
	<h3>Version History</h3>
</section>
<section class="content">
	<div class="box box-primary">
		<div class="box-body">	    
			  This is a simple CRUD with login AUTH application written in procedural PHP, mysqli, bootstrap, adminLTE and jquery. This app has the following features:
			  <ul>
			  	<li>CRUD Create Update and Delete Records</li>
			  	<li>Pagination</li>
			  	<li>Search fucntionality</li>
			  	<li>Configurable Variables in config.php which includes date time format, app name, max records per pafe, theme</li>
			  	<li>Authentication System</li>
			  </ul>
			  Work in progress
			  <ul>
			  	<li>Password Crypting</li>
			  	<li><s>Forgot password with email link</s> -7-24-2016</li>
			  	<li>user registration</li>
			  	<li><s>advanced search(search by dates)</s> -6-5-2016</li>
			  	<li>export to xls, csv, pdf and print</li>
			  	<li><s>define max records shown per page in config.php</s></li>
			  	<li>elimate unused bootstrap js code.</li> 
			  	<li><s>Enhance Delete</s></li>
			  	<li>Give the option to use a page or a modal in edit view or add</li>
			  	<li>create simple dashboard (Users logged in, Total Users, Users added by Month, Top 10 users recently updated, 10 newest users.)</li>
			  	<li>Integrate Facebook time</li>
			  	<li><s>Fix problem with Google chrome not displaying bootstrap alerts</s></li>
			  	<li><s>Expand Fields, phone, firstname, lastname</s> -6-6-2016</li>
			  	<li><s>Concat first and lastname so a search can be done using both</s> -6-6-2016</li>
			  	<li><s>Format phone number during input and edit and view</s> -6-6-2016</li>
			  	<li>Sortby field in advanced users</li>
			  	<li>Selectable number of records per page in advanced users</li>
			  	<li>Create a relational table to users</li>
			  	<li>Add upload image User Avatar, need to find an ajax fix for file uploads</li>
			  	<li><s>Show number of records returned</s> -6-5-2016</li>
			  	<li><s>Create several list users simple medium and advanced</s> -6-5-2016</li>
			  	<li><s>Rename variables q to query and p to page to make it easier to read in the URI</s> -6-5-2016</li>
			  	<li><s>Use jquery for top nav active instead of php if conditions</s></li>
			  	<li>Fix issue under users advanced if you click a canned date the URI doesnt reflect the datefrom and dateto until you submit again</li>
			  	<li>Add animation to slowly fade alerts</li>
			  	<li>Create Permission system</li>
			  	<li>create logging system</li>
			  	<li>Create Extra Field a check box radio selection, and Select drop down</li>
			  	<li><s>Port CSS/JS libs from bootstrap to AdminLTE</s> -7-24-2016</li>
			  	<li><s>Upgraded to AdminLTE 2.3.6 from 2.3.5</s> -8-7-2016</li>
			  	<li><s>Upgrade to AdminLTE 2.3.8 from 2.3.6</s> -11-22-2016</li>
			  	<li><s>Added Auto Focus to email/username field in login page</s> -11-22-2016</li>
			  	<li><s>(SECURITY FIX) Added intval() to POST/GET Vars to make sure integers are really integers</s> -11-22-2016</li>
			  	<li><s>Removed extra content div in the nav</s> -11-22-2016</li>
			  	<li><s>Set Focus on First Field when adding or editing or search</s> -11-23-2016</li>
				<li><s>Upgrade to AdminLTE 2.3.11 from 2.3.8</s> -5-28-2017</li>
				<li><s>Upgrade to AdminLTE 2.4.3 from 2.3.11</s> -6-27-2018</li>
				<li><s>Moved all Libraries local instead of using some CDNs/Some Local</s></li>
				<li><s>Fix Update Password by replacing var $user_id in post.php to $session_user_id</s></li>
			  </ul>
	 	</div>
	</div>
</section>

<?php include "includes/footer.php"; ?>