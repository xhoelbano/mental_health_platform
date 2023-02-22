<?php include 'db_connect.php' ?>
<?php
if(isset($_GET['id'])){
	$type_arr = array("Admin","Psychologist","Business", "General User", "Student");
	$status_arr = array("Pending","Approved","Rejected");
	$qry = $conn->query("SELECT * FROM `users` where users.id = {$_GET['id']}" )->fetch_array();
foreach($qry as $k => $v){
	$$k = $v;
}
}
?>
<?php if ($type == 0){ ?>
<div class="container-fluid">
    <table class="table">
        <tr>
            <th>Name:</th>
            <td><b><?php echo $row['id'] ?></b></td>
        </tr>
        <tr>
            <th>Email:</th>
            <td><b><?php echo $email ?></b></td>
        </tr>
        <tr>
            <th>Contact:</th>
            <td><b><?php echo $contact ?></b></td>
        </tr>
        <tr>
            <th>Address:</th>
            <td><b><?php echo $address ?></b></td>
        </tr>
        <tr>
            <th>User Role:</th>
            <td><b><?php echo $type_arr[$type] ?></b></td>
        </tr>

    </table>
</div>

<!-- Psychologist Detail -->
<?php }if ($type == 1){ 
	$result = $conn->query("SELECT * FROM `psychologist` where `psychologist_id` = {$_GET['id']}" )->fetch_array();
	foreach($result as $k => $v){
		$$k = $v;
	}
	?>

<div class="container-fluid">
    <table class="table">
        <tr>
            <th>First Name:</th>
            <td><b><?php echo ucwords($firstname) ?></b></td>
        </tr>
        <tr>
            <th>First Name:</th>
            <td><b><?php echo ucwords($lastname) ?></b></td>
        </tr>
        <tr>
            <th>Email:</th>
            <td><b><?php echo $email ?></b></td>
        </tr>
        <tr>
            <th>License Number:</th>
            <td><b><?php echo $license_nr ?></b></td>
        </tr>
        <tr>
            <th>Contact:</th>
            <td><b><?php echo $contact ?></b></td>
        </tr>
        <tr>
            <th>Address:</th>
            <td><b><?php echo $address ?></b></td>
        </tr>
        <tr>
            <th>Website:</th>
            <td><b><?php echo $website ?></b></td>
        </tr>
        <tr>
            <th>User Role:</th>
            <td><b><?php echo $type_arr[$type] ?></b></td>
        </tr>
        <tr>
            <th>Account Status:</th>
            <?php if ($verify_profile == 0){ ?>
            <td style="color:yellow"><b><?php echo $status_arr[$verify_profile]; }?></b></td>
            <?php if ($verify_profile == 1){ ?>
            <td style="color:green"><b><?php echo $status_arr[$verify_profile]; }?></b></td>
            <?php if ($verify_profile == 2){ ?>
            <td style="color:red"><b><?php echo $status_arr[$verify_profile]; }?></b></td>
        </tr>
    </table>
</div>

<!-- Business Detail -->
<?php }if ($type == 2){ 
	$result = $conn->query("SELECT * FROM `business` where `business_id` = {$_GET['id']}" )->fetch_array();
	foreach($result as $k => $v){
	$$k = $v;
	}
?>

<div class="container-fluid">
    <table class="table">
        <tr>
            <th>Business Name:</th>
            <td><b><?php echo ucwords($business_name) ?></b></td>
        </tr>
        <tr>
            <th>Email:</th>
            <td><b><?php echo $email ?></b></td>
        </tr>
        <tr>
            <th>NIPT:</th>
            <td><b><?php echo ucwords($nipt) ?></b></td>
        </tr>
        <tr>
            <th>Contact:</th>
            <td><b><?php echo $contact ?></b></td>
        </tr>
        <tr>
            <th>Address:</th>
            <td><b><?php echo $address ?></b></td>
        </tr>
        <tr>
            <th>Website:</th>
            <td><b><?php echo $website ?></b></td>
        </tr>
        <tr>
            <th>User Role:</th>
            <td><b><?php echo $type_arr[$type] ?></b></td>
        </tr>
        <tr>
            <th>Account Status:</th>
            <?php if ($verify_profile == 0){ ?>
            <td style="color:yellow"><b><?php echo $status_arr[$verify_profile]; }?></b></td>
            <?php if ($verify_profile == 1){ ?>
            <td style="color:green"><b><?php echo $status_arr[$verify_profile]; }?></b></td>
            <?php if ($verify_profile == 2){ ?>
            <td style="color:red"><b><?php echo $status_arr[$verify_profile]; }?></b></td>
        </tr>
    </table>
</div>

<!-- General User Detail -->
<?php }if ($type == 3){ 
	$result = $conn->query("SELECT * FROM `general_users` where `general_user_id` = {$_GET['id']}" )->fetch_array();
	foreach($result as $k => $v){
	$$k = $v;
	}
?>

<div class="container-fluid">
    <table class="table">
        <tr>
            <th>Nickname:</th>
            <td><b><?php echo ucwords($nickname) ?></b></td>
        </tr>
        <tr>
            <th>Email:</th>
            <td><b><?php echo $email ?></b></td>
        </tr>
        <tr>
            <th>Firstname:</th>
            <td><b><?php echo ucwords($firstname) ?></b></td>
        </tr>
        <tr>
            <th>Lastname:</th>
            <td><b><?php echo ucwords($lastname) ?></b></td>
        </tr>
        <tr>
            <th>Contact:</th>
            <td><b><?php echo $contact ?></b></td>
        </tr>
        <tr>
            <th>Address:</th>
            <td><b><?php echo $address ?></b></td>
        </tr>
        <tr>
            <th>User Role:</th>
            <td><b><?php echo $type_arr[$type] ?></b></td>
        </tr>
    </table>
</div>

<!-- Student Detail -->
<?php }if ($type == 4){ ?>

<?php }?>
<div class="modal-footer display p-0 m-0">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
<style>
#uni_modal .modal-footer {
    display: none
}

#uni_modal .modal-footer.display {
    display: flex
}
</style>