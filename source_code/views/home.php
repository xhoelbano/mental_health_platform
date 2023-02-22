<?php include('db_connect.php') ?>
<!-- Info boxes -->
<?php if($_SESSION['type'] == 0): ?>
<!-- Admin -->
<div class="col-12">
    <div class="card">
        <div class="card-body">
            Welcome Administrator!
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-thin fa-brain"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Psychologists in MH Platform</span>
                <span class="info-box-number">
                    <?php echo $conn->query("SELECT * FROM users where type = 1")->num_rows; ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total General Users in MH Platform</span>
                <span class="info-box-number">
                    <?php echo $conn->query("SELECT * FROM users where type = 3")->num_rows; ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>

        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-solid fa-building"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Businesses in MH Platform</span>
                <span class="info-box-number">
                    <?php echo $conn->query("SELECT * FROM users where type = 2")->num_rows; ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Subscribers in MH Platform</span>
                <span class="info-box-number">
                    <?php echo $conn->query("SELECT distinct(answers.user_id) FROM answers")->num_rows; ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>

        <!-- /.info-box -->
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-poll-h"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Surveys in MH Platform</span>
                <span class="info-box-number">
                    <?php
                        $sql = "SELECT * FROM survey_set"; // SQL with parameters
                        $stmt = $conn->prepare($sql); 
                        
                       
                        $stmt->execute();
                        $result = $stmt->get_result(); // get the mysqli result
                        $rows = $result->fetch_assoc(); // fetch data   
                        $num_rows = mysqli_num_rows($result);
                        echo $num_rows;
                    
                    // echo $conn->query("SELECT * FROM survey_set ")->num_rows; ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-solid fa-graduation-cap"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Students in MH Platform</span>
                <span class="info-box-number">
                    <?php echo $conn->query("SELECT * FROM users where type = 4")->num_rows; ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-solid fa-school"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Schools in MH Platform</span>
                <span class="info-box-number">
                    <?php echo $conn->query("SELECT * FROM schools")->num_rows; ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
</div>


<?php elseif($_SESSION['type'] == 1): ?>
<!-- Psychologist -->
<div class="col-12">
    <div class="card">
        <div class="card-body">
            Welcome Psychologist!
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Subscribers in MH Platform</span>
                <span class="info-box-number">
                    <?php echo $conn->query("SELECT distinct(answers.user_id), survey_id FROM answers join survey_set on answers.survey_id = survey_set.id where survey_set.user_id = {$_SESSION['user_id']}")->num_rows; ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-poll-h"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Surveys in MH Platform</span>
                <span class="info-box-number">
                    <?php
                        $sql = "SELECT * FROM survey_set where user_id = ?"; // SQL with parameters
                        $stmt = $conn->prepare($sql); 
                        
                        $stmt->bind_param("i", $_SESSION['user_id']);
                        $stmt->execute();
                        $result = $stmt->get_result(); // get the mysqli result
                        $rows = $result->fetch_assoc(); // fetch data   
                        $num_rows = mysqli_num_rows($result);
                        echo $num_rows;
                    
                    // echo $conn->query("SELECT * FROM survey_set ")->num_rows; ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>


<?php elseif($_SESSION['type'] == 2): ?>
<!-- Business -->
<div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-thin fa-brain"></i></span>

        <div class="info-box-content">
            <span class="info-box-text">Total Active Psychologists in MH Platform</span>
            <span class="info-box-number">
                <?php echo $conn->query("SELECT * FROM users where type = 1")->num_rows; ?>
            </span>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
</div>



<?php elseif($_SESSION['type'] == 3): ?>
<!-- General User -->

<div class="col-12">
    <div class="card">
        <div class="card-body">
            Welcome User!
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-poll-h"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Surveys Taken</span>
                <span class="info-box-number">
                    <?php  
                    $sql = "SELECT distinct(survey_id) FROM answers  where user_id = ?"; // SQL with parameters
                    $stmt = $conn->prepare($sql); 
                    
                    $stmt->bind_param("i", $_SESSION['user_id']);
                    $stmt->execute();
                    $result = $stmt->get_result(); // get the mysqli result
                    $rows = $result->fetch_assoc(); // fetch data   
                    $num_rows = mysqli_num_rows($result);
                    echo $num_rows;
                    // $conn->query("SELECT survey_id FROM answers  where user_id = 3")->num_rows; ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<?php elseif($_SESSION['type'] == 4): ?>
<!-- Student -->

<div class="col-12">
    <div class="card">
        <div class="card-body">
            Welcome Student!
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-poll-h"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Surveys Taken</span>
                <span class="info-box-number">
                    <?php  
                    $sql = "SELECT distinct(survey_id) FROM answers  where user_id = ?"; // SQL with parameters
                    $stmt = $conn->prepare($sql); 
                    
                    $stmt->bind_param("i", $_SESSION['user_id']);
                    $stmt->execute();
                    $result = $stmt->get_result(); // get the mysqli result
                    $rows = $result->fetch_assoc(); // fetch data   
                    $num_rows = mysqli_num_rows($result);
                    echo $num_rows;
                    // $conn->query("SELECT survey_id FROM answers  where user_id = 3")->num_rows; ?>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>

<?php endif; ?>