<div class="page-wrapper auth">
    <div class="page-inner bg-brand-gradient">
        <div class="page-content-wrapper bg-transparent m-0">
            <div class="height-10 w-100 shadow-lg px-4 bg-brand-gradient">
                <div class="d-flex align-items-center container p-0">
                    <div
                        class="page-logo width-mobile-auto m-0 align-items-center justify-content-center p-0 bg-transparent bg-img-none shadow-0 height-9 border-0">
                        <a href="javascript:void(0)" class="page-logo-link press-scale-down d-flex align-items-center">
                            <img src="<?= base_url() ?>/assets/img/logo.png" alt="ICTLayer" aria-roledescription="logo">
                            <span class="page-logo-text mr-1">Work In Progress(WIPLayer)</span>
                        </a>
                    </div>
                    <a href="<?= base_url('ironman/register') ?>" class="btn-link text-white ml-auto">
                        Create Account
                    </a>
                </div>
            </div>
            <div class="flex-1"
                style="background: url(<?= base_url() ?>/assets/img/svg/pattern-1.svg) no-repeat center bottom fixed; background-size: cover;">
                <div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
                    <div class="row">
                        <div class="col col-md-6 col-lg-7 hidden-sm-down">
                            <h2 class="fs-xxl fw-500 mt-4 text-white">
                                - Provided by ICT Layer -
                            </h2>
                            <div class="login-address text-sm-left text-white ml-3">
                                <p>149 East Senpara, Mirpur</p>
                                <p>Dhaka-1216, Bangladesh.</p>
                                <p><b>Phone:</b> +880 1844-096540, +880 1844-096541</li>
                                <p><b>Email:</b> info@ictlayer.com</p>
                                <p>Copyright &COPY; www.ictlayer.com</p>
                            </div>
                            <div class="d-sm-flex flex-column align-items-center justify-content-center d-md-block">
                                <div class="px-0 py-1 mt-5 text-white fs-nano opacity-50">
                                    Find us on social media
                                </div>
                                <div class="d-flex flex-row opacity-70">
                                    <a href="#" class="mr-2 fs-xxl text-white">
                                        <i class="fab fa-facebook-square"></i>
                                    </a>
                                    <a href="#" class="mr-2 fs-xxl text-white">
                                        <i class="fab fa-twitter-square"></i>
                                    </a>
                                    <a href="#" class="mr-2 fs-xxl text-white">
                                        <i class="fab fa-google-plus-square"></i>
                                    </a>
                                    <a href="#" class="mr-2 fs-xxl text-white">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-5 col-xl-4 ml-auto">
                            <h1 class="text-white fw-300 mb-3 d-sm-block d-md-none">
                                Secure login
                            </h1>
                            <div class="card p-4 rounded-plus bg-faded">
                                <form id="js-login" class="was-validated" novalidate="" method="post"
                                    action="<?php echo base_url() . '/login_c/check_login' ?>" autocomplete="off">
                                    <div class="form-group input-group-sm">
                                        <label class="form-label" for="user_email">User Email or Phone No.</label>
                                        <!-- <input type="email" id="user_email" data-inputmask="'alias': 'email'" name="user_email" class="form-control form-control-lg" placeholder="your email" data-inputmask="'alias': 'email'" required> -->
                                        <input name="user_email_or_phone" type="text" placeholder="example.xyz.com or 01XXXXXXXX" class="form-control" aria-label="Email_Phone"
                                            aria-describedby="addon-wrapping-left"
                                            data-template='<div class="tooltip" role="tooltip"><div class="tooltip-inner small fw-400"></div></div>'
                                            data-toggle="tooltip" data-original-title="E-mail or phone no. must be valid format."
                                            required>

                                        <div class="invalid-feedback">No, You missed this one.</div>
                                        <div class="help-block">Your user email or phone no.</div>
                                    </div>
                                    <div class="form-group input-group-sm">
                                        <label class="form-label" for="user_password">Password</label>
                                        <input type="password" id="user_password" name="user_password"
                                            class="form-control form-control-lg" placeholder="password" required>
                                        <div class="invalid-feedback">Sorry, You missed this one.</div>
                                        <div class="help-block">Your password.</div>
                                    </div>
                                    <div class="row no-gutters">
                                        <div class="col-lg-6 pr-lg-1 my-2">
                                            <button type="submit" class="btn btn-info btn-block btn-lg">Sign in with <i
                                                    class="fab fa-google"></i></button>
                                        </div>
                                        <div class="col-lg-6 pl-lg-1 my-2">
                                            <button id="js-login-btn" type="submit"
                                                class="btn btn-danger btn-block btn-lg">Secure login</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="position-absolute pos-bottom pos-left pos-right p-3 text-center text-white">
                        2012-<?php echo date('Y'); ?>&nbsp; © &nbsp; <a href='https://www.ictlayer.com/'
                            class='text-white opacity-40 fw-500' title='https://www.ictlayer.com/'
                            target='_blank'>ICTLayer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script>
    $("#js-login-btn").click(function(event) {

        // Fetch form to apply custom Bootstrap validation
        var form = $("#js-login")

        if (form[0].checkValidity() === false) {
            event.preventDefault()
            event.stopPropagation()
        }

        form.addClass('was-validated');
        // Perform ajax submit here...
    });
</script> -->