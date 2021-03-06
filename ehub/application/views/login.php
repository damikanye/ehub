<?php

    $this->load->view('layouts/auth_header.php');

?>

<body class="app flex-row align-items-center">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-group">
                <div class="card p-4">
                    <div class="card-body">
                        <form method="post" action="login">
                        <h1>Login</h1>
                            <?php

                            echo validation_errors();

                            if(!empty($success_msg)){
                                echo '<p class="statusMsg">'.$success_msg.'</p>';
                            }elseif(!empty($error_msg)){
                                echo '<p style="color: red" class="statusMsg">'.$error_msg.'</p>';
                            }

                            ?>
                        <p class="text-muted">Sign In to your account</p>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-user"></i>
                    </span>
                            </div>
                            <input name="email" class="form-control" type="text" placeholder="Email">
                        </div>
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="icon-lock"></i>
                    </span>
                            </div>
                            <input name="password" class="form-control" type="password" placeholder="Password">
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <input class="btn btn-primary px-4" name="submit" type="submit" value="Login" />
                            </div>
                            <div class="col-6 text-right">
                                <button class="btn btn-link px-0" type="button">Forgot password?</button>
                            </div>
                            <div class="col-md-12">
                                <p>Not registered? <a href="<?php echo base_url();?>user/registration">Register</a> </p>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                    <div class="card-body text-center">
                        <div>
                            <h2>Sign up</h2>
                            <button class="btn btn-primary active mt-3" type="button" onclick="register()">Register Now!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function register() {
        window.location = "registration";
    }
</script>

<?php

$this->load->view('layouts/auth_footer.php');

?>
