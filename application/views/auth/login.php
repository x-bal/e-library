<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>E-Library | Login</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN core-css ================== -->
    <link href="<?= base_url('/') ?>assets/css/vendor.min.css" rel="stylesheet" />
    <link href="<?= base_url('/') ?>assets/css/apple/app.min.css" rel="stylesheet" />
    <link href="<?= base_url('/') ?>assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" />
    <!-- ================== END core-css ================== -->
</head>

<body class='pace-top'>
    <!-- BEGIN #loader -->
    <div id="loader" class="app-loader">
        <span class="spinner"></span>
    </div>
    <!-- END #loader -->

    <!-- BEGIN #app -->
    <div id="app" class="app">
        <!-- BEGIN login -->
        <div class="login login-with-news-feed">
            <!-- BEGIN news-feed -->
            <div class="news-feed">
                <div class="news-image" style="background-image: url(<?= base_url('/') ?>assets/img/login-bg/login-bg-11.jpg)"></div>
                <div class="news-caption">
                    <h4 class="caption-title"><b>E</b> Library App</h4>
                    <p>
                        Download the Color Admin app for iPhone®, iPad®, and Android™. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    </p>
                </div>
            </div>
            <!-- END news-feed -->

            <!-- BEGIN login-container -->
            <div class="login-container">
                <!-- BEGIN login-header -->
                <div class="login-header mb-30px">
                    <div class="brand">
                        <div class="d-flex align-items-center">
                            <span class="logo"><i class="ion-ios-cloud"></i></span>


                            <b>E</b> Library
                        </div>
                        <small>Login with your account.</small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-sign-in-alt"></i>
                    </div>
                </div>
                <!-- END login-header -->

                <!-- BEGIN login-content -->
                <div class="login-content">
                    <form action="<?= base_url('/login') ?>" method="post" class="fs-13px">
                        <div class="form-floating mb-15px">
                            <input type="text" name="username" class="form-control h-45px fs-13px" placeholder="Username" id="username" />
                            <label for="username" class="d-flex align-items-center fs-13px text-gray-600">Username</label>

                            <small class="text-danger"><?= form_error('username') ?></small>
                        </div>
                        <div class="form-floating mb-15px">
                            <input type="password" class="form-control h-45px fs-13px" placeholder="Password" name="password" id="password" />
                            <label for="password" class="d-flex align-items-center fs-13px text-gray-600">Password</label>

                            <?php if (form_error('username')) : ?>
                                <small class="text-danger mt-3"><?= form_error('username') ?></small>
                            <?php endif; ?>
                        </div>

                        <div class="form-floating text-center mb-15px">
                            <?php if ($this->session->flashdata('error')) : ?>
                                <small class="text-danger mt-3 mb-3"><?= $this->session->flashdata('error') ?></small>
                            <?php endif; ?>
                        </div>

                        <div class="mb-15px">
                            <button type="submit" class="btn btn-success d-block h-45px w-100 btn-lg fs-14px">Sign me in</button>
                        </div>
                        <!-- <div class="mb-40px pb-40px text-inverse">
                            Not a member yet? Click <a href="register_v3.html" class="text-primary">here</a> to register.
                        </div> -->
                        <hr class="bg-gray-600 opacity-2" />
                        <div class="text-gray-600 text-center text-gray-500-darker mb-0">
                            &copy; E-Library All Right Reserved 2023
                        </div>
                    </form>
                </div>
                <!-- END login-content -->
            </div>
            <!-- END login-container -->
        </div>
        <!-- END login -->

        <!-- END theme-panel -->
        <!-- BEGIN scroll-top-btn -->
        <a href="javascript:;" class="btn btn-icon btn-circle btn-primary btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
        <!-- END scroll-top-btn -->
    </div>
    <!-- END #app -->

    <!-- ================== BEGIN core-js ================== -->
    <script src="<?= base_url('/') ?>assets/js/vendor.min.js"></script>
    <script src="<?= base_url('/') ?>assets/js/app.min.js"></script>
    <script src="<?= base_url('/') ?>assets/js/theme/apple.min.js"></script>
    <!-- ================== END core-js ================== -->
</body>

</html>