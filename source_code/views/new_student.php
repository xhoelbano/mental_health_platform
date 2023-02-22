<?php include 'db_connect.php' ?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">

            <form action="" id="manage_student">
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
                <div class="row">
                    <div class="col-md-6">
                        <b class="text-muted">New Student Credentials</b>
                        <div class="form-group">
                            <label for="" class="control-label">Email</label>
                            <input type="text" name="email" id="email" class="form-control form-control-sm" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control form-control-sm"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Firstname</label>
                            <input type="text" name="firstname" id="firstname" class="form-control form-control-sm"
                                required value="<?php echo isset($firstname) ? $firstname : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Lastname</label>
                            <input type="text" name="lastname" id="lastname" class="form-control form-control-sm"
                                required value="<?php echo isset($lastname) ? $lastname : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Parent 1 Email</label>
                            <input type="email" name="parent_1_email" id="parent_1_email"
                                class="form-control form-control-sm" required
                                value="<?php echo isset($parent_1_email) ? $parent_1_email : '' ?>">
                        </div>
                        <div class="form-group">
                            <label for="" class="control-label">Parent 2 Email</label>
                            <input type="email" name="parent_2_email" id="parent_2_email"
                                class="form-control form-control-sm" required
                                value="<?php echo isset($parent_2_email) ? $parent_2_email : '' ?>">
                        </div>
                    </div>
                    <hr>
                    <div class="col-lg-12 text-right justify-content-center d-flex">
                        <button class="btn btn-primary mr-2">Save</button>
                        <button class="btn btn-secondary" type="button"
                            onclick="location.href = 'index.php?page=student_list'">Cancel</button>
                    </div>
            </form>

        </div>
    </div>
</div>
<?php endif; ?>
<script>
$('#manage_student').submit(function(e) {
    e.preventDefault()
    $('input').removeClass("border-danger")
    start_load()
    $('#msg').html('')
    $.ajax({
        url: 'ajax.php?action=save_student',
        data: new FormData($(this)[0]),
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST',
        success: function(resp) {
            if (resp == 1) {
                alert_toast('Student successfully added.', "success");
                setTimeout(function() {
                    location.replace('index.php?page=student_list')
                }, 1500)
            } else {
                alert_toast('There exist a student with this email! Please try again!', "error");
                setTimeout(function() {
                    location.replace('index.php?page=new_student')
                }, 3000)
            }
        }
    })
})
</script>