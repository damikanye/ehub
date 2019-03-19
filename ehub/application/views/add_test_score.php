<?php

$this->load->view('layouts/admin_header.php');

?>

<main class="main">
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Welcome, <?php echo ucfirst($this->session->userdata('username')); ?></li>
        <li class="breadcrumb-item active">Dashboard</li>
        <!-- Breadcrumb Menu-->
        <li class="breadcrumb-menu d-md-down-none">
            <div class="btn-group" role="group" aria-label="Button group">
                <a class="btn" href="#">
                    <i class="icon-speech"></i>
                </a>
                <a class="btn" href="./">
                    <i class="icon-graph"></i> Dashboard</a>
                <a class="btn" href="#">
                    <i class="icon-settings"></i> Settings</a>
            </div>
        </li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">

            <div class="col-md-6 offset-3">
                <div class="card-group">
                    <div class="card p-4">
                        <div class="card-body">
                            <form method="post" action="<?php echo base_url(); ?>admin/add_test_score">
                                <h1>Test Scores</h1>
                                <?php

                                echo validation_errors();

                                if(!empty($success_msg)){
                                    echo '<p class="statusMsg">'.$success_msg.'</p>';
                                }elseif(!empty($error_msg)){
                                    echo '<p style="color: red" class="statusMsg">'.$error_msg.'</p>';
                                }

                                ?>
                                <p class="text-muted">Add Test Scores</p>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-user"></i>
                    </span>
                                    </div>
                                    <input name="fullname" class="form-control" type="text" placeholder="Student Name">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-briefcase"></i>
                    </span>
                                    </div>
                                    <input name="email" class="form-control" type="text" placeholder="Student Email">
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-pencil"></i>
                    </span>
                                    </div>
                                    <input name="score" class="form-control" type="number" placeholder="Test Score">
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <input class="btn btn-success px-md-4" name="submit" type="submit" value="Add" />
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
    </div>
</div>
</main>


<?php

$this->load->view('layouts/admin_footer.php');

?>
