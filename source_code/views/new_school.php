<?php
?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">

            <form action="" id="manage_user">
                <input type="hidden" name="admin_id" id="admin_id" value="<?php echo $_SESSION['user_id'] ?>">
                <div class="row">
                    <div class="col-md-6 border-right">
                        <b class="text-muted">New School Information</b>
                        <div class="form-group">
                            <label for="" class="control-label">School Name</label>
                            <input type="text" name="name" id="name" class="form-control form-control-sm" required
                                value="<?php echo isset($name) ? $name : '' ?>">
                        </div>

                        <div class="form-group">
                            <label for="" class="control-label">Activation Code</label>
                            <input type="text" name="activation_code" id="activation_code"
                                class="form-control form-control-sm"
                                value="<?php echo isset($activation_code) ? $activation_code : '' ?>">
                        </div>

                    </div>

                </div>
                <hr>
                <div class="col-lg-12 text-right justify-content-center d-flex">
                    <button class="btn btn-primary mr-2">Save</button>
                    <button class="btn btn-secondary" type="button"
                        onclick="location.href = 'index.php?page=school_list'">Cancel</button>
                </div>
            </form>

        </div>
    </div>
</div>
<script>
$('#manage_user').submit(function(e) {
    e.preventDefault()
    $('input').removeClass("border-danger")
    start_load()
    $('#msg').html('')

    $.ajax({
        url: 'ajax.php?action=save_school',
        data: new FormData($(this)[0]),
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST',
        success: function(resp) {
            if (resp == 1) {
                alert_toast('Data successfully saved.', "success");
                setTimeout(function() {
                    location.replace('index.php?page=school_list')
                }, 750)
            } else if (resp == 2) {
                $('#msg').html("<div class='alert alert-danger'>Email already exist.</div>");
                $('[name="email"]').addClass("border-danger")
                end_load()
            }
        }
    })
})
</script>