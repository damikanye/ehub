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
                <!-- /.row-->
                <div class="row">

                    <div class="col-md-10">
                    </div>

                    <div class="col-md-2">
                        <a href="<?php echo base_url(); ?>admin/add_exam_score" class="btn btn-pill btn-block btn-success">Add</a>
                        <br>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">Traffic & Sales</div>
                            <div class="card-body">
                                <!-- /.row-->
                                <br>
                                <table class="table table-responsive-sm table-hover table-outline mb-0">
                                    <thead class="thead-light">
                                    <tr>
                                        <th class="text-center">
                                            <i class="icon-people"></i>
                                        </th>
                                        <th>Student's Name</th>
                                        <th class="text-center">Student's Email</th>
                                        <th>Test</th>
                                        <th>Exam</th>
                                        <th class="text-center">Grade</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <?php

                                    if($testScores) {

                                        foreach($testScores->result() as $key => $test) {
                                            if($test->score >= 60) {
                                                $grade  = 'A';
                                            } else if($test->score >= 25 && $test->score <= 29) {
                                                $grade ='B';
                                            } else if($test->score >= 20 && $test->score <= 24) {
                                                $grade ='C';
                                            } else if($test->score >= 15 && $test->score <= 19) {
                                                $grade ='D';
                                            } else if($test->score >= 10 && $test->score <= 14) {
                                                $grade ='E';
                                            } else if($test->score >= 5 && $test->score <= 9) {
                                                $grade ='F';
                                            }
                                            echo '<tr>
                                        <td class="text-center">
                                            <div class="avatar">
                                                '.($key + 1).'
                                            </div>
                                        </td>
                                        <td>
                                            <div>'.$test->fullname.'</div>
                                        </td>
                                        <td class="text-center">
                                            <div>'.$test->email.'</div>
                                        </td>
                                        <td>
                                            <div>'.$test->score.'</div>
                                        </td>
                                        <td class="text-center">
                                            <div>'.$grade.'</div>
                                        </td>
                                        <td>
                                            <a href="'.base_url().'admin/edit_test_score?id='.$test->id.'" class="btn btn-outline-primary"><span class="icon-note text-primary mr-2"></span></a>
                                            <a href="'.base_url().'admin/delete_test_score?id='.$test->id.'" onclick="confirmMessage(event)" class="btn btn-outline-primary"><span class="icon-trash text-primary mr-2"></span></a>
                                        </td>
                                    </tr>';
                                        }
                                    }

                                    ?>
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                    <!-- /.col-->
                </div>
                <!-- /.row-->
            </div>
        </div>
    </main>
    <aside class="aside-menu">
        <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">
                    <i class="icon-list"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#messages" role="tab">
                    <i class="icon-speech"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#settings" role="tab">
                    <i class="icon-settings"></i>
                </a>
            </li>
        </ul>
        <!-- Tab panes-->
        <!-- <div class="tab-content">
            <div class="tab-pane active" id="timeline" role="tabpanel">
                <div class="list-group list-group-accent">
                    <div class="list-group-item list-group-item-accent-secondary bg-light text-center font-weight-bold text-muted text-uppercase small">Today</div>
                    <div class="list-group-item list-group-item-accent-warning list-group-item-divider">
                        <div class="avatar float-right">
                            <img class="img-avatar" src="<?php echo base_url(); ?>assets/img/avatars/7.jpg" alt="admin@bootstrapmaster.com">
                        </div>
                        <div>Meeting with
                            <strong>Lucas</strong>
                        </div>
                        <small class="text-muted mr-3">
                            <i class="icon-calendar"></i>  1 - 3pm</small>
                        <small class="text-muted">
                            <i class="icon-location-pin"></i>  Palo Alto, CA</small>
                    </div>
                    <div class="list-group-item list-group-item-accent-info">
                        <div class="avatar float-right">
                            <img class="img-avatar" src="<?php echo base_url(); ?>assets/img/avatars/4.jpg" alt="admin@bootstrapmaster.com">
                        </div>
                        <div>Skype with
                            <strong>Megan</strong>
                        </div>
                        <small class="text-muted mr-3">
                            <i class="icon-calendar"></i>  4 - 5pm</small>
                        <small class="text-muted">
                            <i class="icon-social-skype"></i>  On-line</small>
                    </div>
                    <div class="list-group-item list-group-item-accent-secondary bg-light text-center font-weight-bold text-muted text-uppercase small">Tomorrow</div>
                    <div class="list-group-item list-group-item-accent-danger list-group-item-divider">
                        <div>New UI Project -
                            <strong>deadline</strong>
                        </div>
                        <small class="text-muted mr-3">
                            <i class="icon-calendar"></i>  10 - 11pm</small>
                        <small class="text-muted">
                            <i class="icon-home"></i>  creativeLabs HQ</small>
                        <div class="avatars-stack mt-2">
                            <div class="avatar avatar-xs">
                                <img class="img-avatar" src="<?php echo base_url(); ?>assets/img/avatars/2.jpg" alt="admin@bootstrapmaster.com">
                            </div>
                            <div class="avatar avatar-xs">
                                <img class="img-avatar" src="<?php echo base_url(); ?>assets/img/avatars/3.jpg" alt="admin@bootstrapmaster.com">
                            </div>
                            <div class="avatar avatar-xs">
                                <img class="img-avatar" src="<?php echo base_url(); ?>assets/img/avatars/4.jpg" alt="admin@bootstrapmaster.com">
                            </div>
                            <div class="avatar avatar-xs">
                                <img class="img-avatar" src="<?php echo base_url(); ?>assets/img/avatars/5.jpg" alt="admin@bootstrapmaster.com">
                            </div>
                            <div class="avatar avatar-xs">
                                <img class="img-avatar" src="<?php echo base_url(); ?>assets/img/avatars/6.jpg" alt="admin@bootstrapmaster.com">
                            </div>
                        </div>
                    </div>
                    <div class="list-group-item list-group-item-accent-success list-group-item-divider">
                        <div>
                            <strong>#10 Startups.Garden</strong> Meetup</div>
                        <small class="text-muted mr-3">
                            <i class="icon-calendar"></i>  1 - 3pm</small>
                        <small class="text-muted">
                            <i class="icon-location-pin"></i>  Palo Alto, CA</small>
                    </div>
                    <div class="list-group-item list-group-item-accent-primary list-group-item-divider">
                        <div>
                            <strong>Team meeting</strong>
                        </div>
                        <small class="text-muted mr-3">
                            <i class="icon-calendar"></i>  4 - 6pm</small>
                        <small class="text-muted">
                            <i class="icon-home"></i>  creativeLabs HQ</small>
                        <div class="avatars-stack mt-2">
                            <div class="avatar avatar-xs">
                                <img class="img-avatar" src="<?php echo base_url(); ?>assets/img/avatars/2.jpg" alt="admin@bootstrapmaster.com">
                            </div>
                            <div class="avatar avatar-xs">
                                <img class="img-avatar" src="<?php echo base_url(); ?>assets/img/avatars/3.jpg" alt="admin@bootstrapmaster.com">
                            </div>
                            <div class="avatar avatar-xs">
                                <img class="img-avatar" src="<?php echo base_url(); ?>assets/img/avatars/4.jpg" alt="admin@bootstrapmaster.com">
                            </div>
                            <div class="avatar avatar-xs">
                                <img class="img-avatar" src="<?php echo base_url(); ?>assets/img/avatars/5.jpg" alt="admin@bootstrapmaster.com">
                            </div>
                            <div class="avatar avatar-xs">
                                <img class="img-avatar" src="<?php echo base_url(); ?>assets/img/avatars/6.jpg" alt="admin@bootstrapmaster.com">
                            </div>
                            <div class="avatar avatar-xs">
                                <img class="img-avatar" src="<?php echo base_url(); ?>assets/img/avatars/7.jpg" alt="admin@bootstrapmaster.com">
                            </div>
                            <div class="avatar avatar-xs">
                                <img class="img-avatar" src="<?php echo base_url(); ?>assets/img/avatars/8.jpg" alt="admin@bootstrapmaster.com">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane p-3" id="messages" role="tabpanel">
                <div class="message">
                    <div class="py-3 pb-5 mr-3 float-left">
                        <div class="avatar">
                            <img class="img-avatar" src="<?php echo base_url(); ?>assets/img/avatars/7.jpg" alt="admin@bootstrapmaster.com">
                            <span class="avatar-status badge-success"></span>
                        </div>
                    </div>
                    <div>
                        <small class="text-muted">Lukasz Holeczek</small>
                        <small class="text-muted float-right mt-1">1:52 PM</small>
                    </div>
                    <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                    <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
                </div>
                <hr>
                <div class="message">
                    <div class="py-3 pb-5 mr-3 float-left">
                        <div class="avatar">
                            <img class="img-avatar" src="<?php echo base_url(); ?>assets/img/avatars/7.jpg" alt="admin@bootstrapmaster.com">
                            <span class="avatar-status badge-success"></span>
                        </div>
                    </div>
                    <div>
                        <small class="text-muted">Lukasz Holeczek</small>
                        <small class="text-muted float-right mt-1">1:52 PM</small>
                    </div>
                    <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                    <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
                </div>
                <hr>
                <div class="message">
                    <div class="py-3 pb-5 mr-3 float-left">
                        <div class="avatar">
                            <img class="img-avatar" src="<?php echo base_url(); ?>assets/img/avatars/7.jpg" alt="admin@bootstrapmaster.com">
                            <span class="avatar-status badge-success"></span>
                        </div>
                    </div>
                    <div>
                        <small class="text-muted">Lukasz Holeczek</small>
                        <small class="text-muted float-right mt-1">1:52 PM</small>
                    </div>
                    <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                    <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
                </div>
                <hr>
                <div class="message">
                    <div class="py-3 pb-5 mr-3 float-left">
                        <div class="avatar">
                            <img class="img-avatar" src="<?php echo base_url(); ?>assets/img/avatars/7.jpg" alt="admin@bootstrapmaster.com">
                            <span class="avatar-status badge-success"></span>
                        </div>
                    </div>
                    <div>
                        <small class="text-muted">Lukasz Holeczek</small>
                        <small class="text-muted float-right mt-1">1:52 PM</small>
                    </div>
                    <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                    <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
                </div>
                <hr>
                <div class="message">
                    <div class="py-3 pb-5 mr-3 float-left">
                        <div class="avatar">
                            <img class="img-avatar" src="<?php echo base_url(); ?>assets/img/avatars/7.jpg" alt="admin@bootstrapmaster.com">
                            <span class="avatar-status badge-success"></span>
                        </div>
                    </div>
                    <div>
                        <small class="text-muted">Lukasz Holeczek</small>
                        <small class="text-muted float-right mt-1">1:52 PM</small>
                    </div>
                    <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                    <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt...</small>
                </div>
            </div>
            <div class="tab-pane p-3" id="settings" role="tabpanel">
                <h6>Settings</h6>
                <div class="aside-options">
                    <div class="clearfix mt-4">
                        <small>
                            <b>Option 1</b>
                        </small>
                        <label class="switch switch-label switch-pill switch-success switch-sm float-right">
                            <input class="switch-input" type="checkbox" checked="">
                            <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
                        </label>
                    </div>
                    <div>
                        <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</small>
                    </div>
                </div>
                <div class="aside-options">
                    <div class="clearfix mt-3">
                        <small>
                            <b>Option 2</b>
                        </small>
                        <label class="switch switch-label switch-pill switch-success switch-sm float-right">
                            <input class="switch-input" type="checkbox">
                            <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
                        </label>
                    </div>
                    <div>
                        <small class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</small>
                    </div>
                </div>
                <div class="aside-options">
                    <div class="clearfix mt-3">
                        <small>
                            <b>Option 3</b>
                        </small>
                        <label class="switch switch-label switch-pill switch-success switch-sm float-right">
                            <input class="switch-input" type="checkbox">
                            <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
                        </label>
                    </div>
                </div>
                <div class="aside-options">
                    <div class="clearfix mt-3">
                        <small>
                            <b>Option 4</b>
                        </small>
                        <label class="switch switch-label switch-pill switch-success switch-sm float-right">
                            <input class="switch-input" type="checkbox" checked="">
                            <span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
                        </label>
                    </div>
                </div>
                <hr>
                <h6>System Utilization</h6>
                <div class="text-uppercase mb-1 mt-4">
                    <small>
                        <b>CPU Usage</b>
                    </small>
                </div>
                <div class="progress progress-xs">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small class="text-muted">348 Processes. 1/4 Cores.</small>
                <div class="text-uppercase mb-1 mt-2">
                    <small>
                        <b>Memory Usage</b>
                    </small>
                </div>
                <div class="progress progress-xs">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small class="text-muted">11444GB/16384MB</small>
                <div class="text-uppercase mb-1 mt-2">
                    <small>
                        <b>SSD 1 Usage</b>
                    </small>
                </div>
                <div class="progress progress-xs">
                    <div class="progress-bar bg-danger" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small class="text-muted">243GB/256GB</small>
                <div class="text-uppercase mb-1 mt-2">
                    <small>
                        <b>SSD 2 Usage</b>
                    </small>
                </div>
                <div class="progress progress-xs">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small class="text-muted">25GB/256GB</small>
            </div>
        </div>
    </aside>
    </div> -->


    <script>
        function confirmMessage(event) {

            if( window.confirm("Are you sure want to delete this?") ) {
                //alert('You\'re alright!');
            } else{
                event.preventDefault();
            }

        }
    </script>
<?php

$this->load->view('layouts/admin_footer.php');

?>