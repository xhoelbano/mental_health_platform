<?php include'db_connect.php' ?>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assets/css/light-bootstrap-dashboard.css" rel="stylesheet" />
    <link href="./assets/css/demo.css" rel="stylesheet" />
</head>

<body>
    <div class="wrapper">

        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                        </ul>

                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>NIPT</th>
                                            <th>Status</th>

                                            <th>Approve</th>
                                            <th>Reject</th>
                                            <th>Delete</th>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $status_arr = array("Pending","Approved","Rejected");
											$result = mysqli_query($conn,"SELECT business.business_id,business.business_name,business.nipt,business.verify_profile,users.email
																				FROM business INNER JOIN users ON business.business_id = users.id ORDER BY users.date_created");	
							
											while($rows = mysqli_fetch_assoc($result))
											{
											echo "<tr>
												<td>".$rows['business_name']."</td>
												<td>".$rows['email']."</td>
                                                <td>".$rows['nipt']."</td>
												<td>".$status_arr[$rows['verify_profile']]."</td>
												<td><form action='../controller/approve_delete_bus.php' method='POST'>
													<input type='hidden' name='accdel' value='1'>
													<input type='hidden' name='bus' value=".$rows['business_id'].">
													<button type='submit' class='btn btn-info btn-fill center' style='background-color: rgb(28, 131, 52); border-color: rgb(28, 131, 52);'><a>Approve</a></button>
													</form></td>
												<td><form action='../controller/approve_delete_bus.php' method='POST'>
													<input type='hidden' name='accdel' value='0'>
													<input type='hidden' name='bus' value='".$rows['business_id']."'>
													<button type='submit' class='btn btn-info btn-fill center' style='background-color: rgb(219, 47, 47); border-color: rgb(219, 47, 47);'><a>Reject</a></button>
													</form></td>
												<td><form action='../controller/approve_delete_bus.php' method='POST'>
													<input type='hidden' name='accdel' value='2'>
													<input type='hidden' name='bus' value='".$rows['business_id']."'>
													<button type='submit' class='btn btn-info btn-fill center' style='background-color: rgb(219, 47, 47); border-color: rgb(219, 47, 47);'><a>Delete</a></button>
													</form></td>
												</tr>"; 
											}
											?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <footer class="footer">
                            <div class="container-fluid">

                            </div>
                        </footer>
                    </div>
                </div>


</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>

</html>

<script>
$(document).ready(function() {
    $('#list').dataTable()
    $('.view_user').click(function() {
        uni_modal("<i class='fa fa-id-card'></i> User Details", "view_user.php?id=" + $(this).attr(
            'data-id'))
    })
    $('.delete_user').click(function() {
        _conf("Are you sure to delete this user?", "delete_user", [$(this).attr('data-id')])
    })
})

function delete_user($id) {
    start_load()
    $.ajax({
        url: 'ajax.php?action=delete_user',
        method: 'POST',
        data: {
            id: $id
        },
        success: function(resp) {
            if (resp == 1) {
                alert_toast("Data successfully deleted", 'success')
                setTimeout(function() {
                    location.reload()
                }, 1500)

            }
        }
    })
}
</script>