<?php 
include('db_connect.php');
session_start();
$utype = array('users','psychologist','business','general_users','students');
if(isset($_GET['id'])){
    $user = $conn->query("SELECT * FROM `users` where id =".$_GET['id']);
    foreach($user->fetch_array() as $k =>$v){
        $meta[$k] = $v;
    }?>
<div class="container-fluid">
    <div id="msg"></div>

    <form action="" id="manage-user">
        <input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id']: '' ?>">
        <div class="form-group">
            <label for="email">Email</label>
            <input required type="email" name="email" id="email" class="form-control"
                value="<?php echo isset($meta['email']) ? $meta['email']: '' ?>" placeholder="Email" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input required type="password" name="password" id="password" class="form-control" placeholder="Password"
                autocomplete="off">
            <small><i>Leave this blank if you dont want to change the password.</i></small>
        </div>
    </form>
</div>



<?php }
?>

<script>
$('#manage-user').submit(function(e) {
    e.preventDefault();
    start_load()
    $.ajax({
        url: 'ajax.php?action=update_user',
        method: 'POST',
        data: $(this).serialize(),
        success: function(resp) {
            if (resp == 1) {
                alert_toast("Data successfully saved", 'success')
                setTimeout(function() {
                    location.reload()
                }, 1500)
            } else {
                $('#msg').html(
                    '<div class="alert alert-danger">Email you provided already exist</div>')
                end_load()
            }
        }
    })
})
</script>