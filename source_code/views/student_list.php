<?php include'db_connect.php' ?>
<div class="col-lg-12">
    <div class="card card-outline card-success">
        <div class="card-header">

        </div>
        <div class="card-body">
            <?php 

$sql = "SELECT linked_school_id FROM psychologist where psychologist_id = ?"; // SQL with parameters
$stmt = $conn->prepare($sql); 

$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
$rows = $result->fetch_assoc(); // fetch data

if($rows['linked_school_id'] == 0): ?>
            <b class="text-muted">You have not activated any school!</b>
            <div class="col-lg-12 text-right justify-content-center d-flex">
                <button class="btn btn-secondary" type="button"
                    onclick="location.href = 'index.php?page=activation_code'">Activate School</button>
            </div>
            <?php else: ?>
            <table class="table tabe-hover table-bordered" id="list">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Email</th>
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Parent 1 email</th>
                        <th>Parent 2 email</th>
                        <th>School ID</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM `students` join users on students.id=users.id where school_id = {$rows['linked_school_id']}");
					while($row= $qry->fetch_assoc()):
					?>
                    <tr>
                        <th class="text-center"><?php echo $i++ ?></th>
                        <td><b><?php echo $row['email'] ?></b></td>
                        <td><b><?php echo $row['firstname'] ?></b></td>
                        <td><b><?php echo $row['lastname'] ?></b></td>
                        <td><b><?php echo $row['parent_1_email'] ?></b></td>
                        <td><b><?php echo $row['parent_2_email'] ?></b></td>
                        <td><b><?php echo $row['school_id'] ?></b></td>
                        <td class="text-center">
                            <button type="button"
                                class="btn btn-default btn-sm btn-flat border-info wave-effect text-info dropdown-toggle"
                                data-toggle="dropdown" aria-expanded="true">
                                Action
                            </button>
                            <div class="dropdown-menu" style="">
                                <a class="dropdown-item delete_student" href="javascript:void(0)"
                                    data-id="<?php echo $row['id'] ?>">Delete</a>
                            </div>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php endif; ?>
<script>
$(document).ready(function() {
    $('#list').dataTable()
    $('.delete_student').click(function() {
        _conf("Are you sure to delete this student?", "delete_student", [$(this).attr('data-id')])
    })
})

function delete_student($id) {
    start_load()
    $.ajax({
        url: 'ajax.php?action=delete_student',
        method: 'POST',
        data: {
            id: $id
        },
        success: function(resp) {
            if (resp == 1) {
                alert_toast("Student successfully deleted", 'success')
                setTimeout(function() {
                    location.reload()
                }, 1500)

            }
        }
    })
}
</script>