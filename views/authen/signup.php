<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.min.css" rel="stylesheet" />
    <!-- MDB -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.3.2/mdb.umd.min.js"></script>
</head>

<body>
    <!-- Section: Design Block -->
    <section class="text-center">
        <!-- Background image -->
        <div class="p-5 bg-image" style="
        background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
        height: 300px;
        "></div>
        <!-- Background image -->

        <div class="card mx-4 mx-md-5 shadow-5-strong bg-body-tertiary" style="
        margin-top: -100px;
        backdrop-filter: blur(30px);
        ">
            <div class="card-body py-5 px-md-5">

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="fw-bold mb-5">Register</h2>
                        <?php
                        if (isset($_SESSION['thanhcong']) && $_SESSION['thanhcong']) { ?>
                            <div class="alert alert-success"><?php echo $_SESSION['thanhcong'] ?></div>
                            <?php
                            unset($_SESSION['thanhcong']);
                            

                        } 
                        if (isset($_SESSION['loi']) && $_SESSION['loi']) { ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php foreach($_SESSION['loi'] as $err): ?>
                                        <li><?= $err ?></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                            <?php
                            unset($_SESSION['loi']);
                            

                        } 
                        


                        ?>
                        <form method="post" action="">
                            <input type="hidden" name="act" value="login">
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <!-- Email input -->
                            <div data-mdb-input-init class=" mb-4">
                                <input type="email" id="form3Example3" class="form-control" name="email" placeholder="Email" />
                                
                            </div>
                            <div data-mdb-input-init class=" mb-4">
                                <input type="text" id="form3Example3" class="form-control" name="username" placeholder="Username" />
                                
                            </div>

                            <!-- Password input -->
                            <div data-mdb-input-init class=" mb-4">
                                <input type="password" id="form3Example4" class="form-control" name="password" placeholder="Password" />
                       
                            </div>
                            <div data-mdb-input-init class=" mb-4">
                                <input type="password" id="form3Example4" class="form-control" name="repassword" placeholder="Re-Password" />
                       
                            </div>

                            <!-- Checkbox -->
                            <div class="form-check d-flex justify-content-center mb-4">
                                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33"
                                    checked />
                                <label class="form-check-label" for="form2Example33">
                                    Lưu thông tin của bạn
                                </label>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-primary btn-block mb-4">
                                Signup
                            </button>

                            <!-- Register buttons -->
                            <div class="text-center">
                                <button type="button" data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-link btn-floating mx-1">
                                    <i class="fab fa-facebook-f"></i>
                                </button>

                                <button type="button" data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-link btn-floating mx-1">
                                    <i class="fab fa-google"></i>
                                </button>

                                <button type="button" data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-link btn-floating mx-1">
                                    <i class="fab fa-twitter"></i>
                                </button>

                                <button type="button" data-mdb-button-init data-mdb-ripple-init
                                    class="btn btn-link btn-floating mx-1">
                                    <i class="fab fa-github"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section: Design Block -->
</body>

</html>