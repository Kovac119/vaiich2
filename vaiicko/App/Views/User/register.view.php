<?php


/** @var Array $data */
/** @var \App\Core\LinkGenerator $link */
?>

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Register account</h5>
                    <div class="text-center text-danger mb-3">
                        <?= @$data['message'] ?>
                    </div>
                        <form id="form" class="form-signin" method="post" enctype="multipart/form-data" action="<?= $link->url("registerUser") ?>">
                        <div class="form-label-group mb-3">
                            <input id="username" type="text" name="username" placeholder="Username" class="form-control form-control-lg" required maxlength="10" minlength="2" autocomplete="off"/>
                        </div>

                        <div class="form-label-group mb-3">
                            <input name="password" type="password" id="password" class="form-control" placeholder="Password" required maxlength="15" minlength="5">
                        </div>
                        <div class="text-center">
                            <button id="register" class="btn btn-primary" type="submit" name="submit" onclick="register()" >Register</button>
                            <p class="text-center text-muted mt-5 mb-0">Already have an account? <a href="?c=auth&a=index" class="fw-bold text-body"><u>Login here</u></a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
