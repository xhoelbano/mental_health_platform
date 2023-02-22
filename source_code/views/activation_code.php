<?php
if(!isset($conn)){
	include 'db_connect.php' ;
}
?>
<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <?php 

            $sql = "SELECT psychologist.linked_school_id,schools.name FROM psychologist join schools on psychologist.linked_school_id=schools.id  where psychologist_id = ?"; // SQL with parameters
            $stmt = $conn->prepare($sql); 

            $stmt->bind_param("i", $_SESSION['user_id']);
            $stmt->execute();
            $result = $stmt->get_result(); // get the mysqli result
            $rows = $result->fetch_assoc(); // fetch data

            if(isset($rows['linked_school_id']) != 0): ?>
            <b class="text-muted">You have connected with school <?php echo $rows['name']?> </b>
            <?php else: ?>
            <form action="" id="add_activation_code">
                <div class="row">
                    <div class="col-md-6 border-right">
                        <div class="form-group">
                            <label for="" class="control-label">Activation Code</label>
                            <input type="text" name="activation_code" id="activation_code"
                                class="form-control form-control-sm" required
                                value="<?php echo isset($activation_code) ? $activation_code : '' ?>">
                        </div>

                    </div>
                    <hr>
                    <div class="col-lg-12 text-right justify-content-center d-flex">
                        <button class="btn btn-primary mr-2">Activate</button>
                        <button class="btn btn-secondary" type="button"
                            onclick="location.href = 'index.php?page=home'">Cancel</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<?php endif; ?>
<script>
$('#add_activation_code').submit(function(e) {
    e.preventDefault()
    $('input').removeClass("border-danger")
    start_load()
    $('#msg').html('')
    $.ajax({
        url: 'ajax.php?action=save_activation_code',
        data: new FormData($(this)[0]),
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        type: 'POST',
        success: function(resp) {

            if (resp == 1) {
                end_load()
                alert_toast('Data successfully saved.', "success");

                setTimeout(function() {
                    location.replace('index.php?page=home')
                }, 1500)
            } else
                alert_toast('There is no school with that activation code. Please try again!',
                    "error");
            setTimeout(function() {
                location.replace('index.php?page=activation_code')
            }, 3000)
        }


    })
})
</script>