<?php

$this->load->view('layouts/auth_header.php');

?>


<body class="app flex-row align-items-center">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mx-4">
                <div class="card-body p-4">
                    <form method="post" action="<?php echo base_url(); ?>User/registration">
                        <h1>Register</h1>
                        <?php

                        echo validation_errors();

                        if(!empty($success_msg)){
                            echo '<p class="statusMsg">'.$success_msg.'</p>';
                        }elseif(!empty($error_msg)){
                            echo '<p style="color: red" class="statusMsg">'.$error_msg.'</p>';
                        }

                        ?>
                        <p class="text-muted">Create your account</p>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="icon-user"></i>
                      </span>
                            </div>
                            <input class="form-control" name="name" type="text" placeholder="Full Name">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">@</span>
                            </div>
                            <input class="form-control" name="email" type="text" placeholder="Email">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="icon-lock"></i>
                      </span>
                            </div>
                            <input class="form-control" name="password" type="password" placeholder="Password">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="icon-globe"></i>
                      </span>
                            </div>
                            <input class="form-control" name="institution" type="text" placeholder="Institution">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="icon-notebook"></i>
                      </span>
                            </div>
                            <input class="form-control" name="department" type="text" placeholder="Department">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="icon-doc"></i>
                      </span>
                            </div>
                            <input class="form-control" name="course" type="text" placeholder="Course">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="icon-event"></i>
                      </span>
                            </div>
                            <select name="accessLevel" class="form-control">
                                <option value="1">Lecturer</option>
                                <option value="2">Student</option>
                            </select>
    <!--                        <input class="form-control" type="text" placeholder="Department">-->
                        </div>
                        <input class="btn btn-block btn-success" name="submit" type="submit" value="Create Account" />
                    </form>
                </div>
                <div class="card-footer p-4">
                    <div class="row">
                        <div class="col-12">
                            <p>Already regisitered? <a href="login.php">Login</a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php

$this->load->view('layouts/auth_footer.php');

?>
