<!doctype html>
<html lang="en" style="height: 100%;">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Parkir Yuk!">
    <meta name="author" content="DiazAP">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link href="/assets/css/toastr.min.css" rel="stylesheet" type="text/css">
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/toastr.min.js"></script>
    <?= view('_partial/toastr'); ?>
    <style>
        .body-style {
            background-color: #c43b3b;
            height: 100%;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }

        .card-style {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }
    </style>
    <title>Parkir Yuk!</title>
</head>

<body class="body-style">
    <div class="card card-style">
        <div class="card-body text-center">
            <div class="row">
                <div class="col">
                    <img src="favicon.ico" alt="logo">
                </div>
                <div class="col">
                    <a href="<?= base_url('auth/login'); ?>" type="button" class="btn btn-dark mt-3">Sign in with Google</a>
                    <small class="text-danger "><?php if (isset($_SESSION['error'])) print_r($_SESSION['error']); ?></small>
                    <p class="mt-3 text-muted">Copyright &copy; Parkir Yuk! <?= date('Y') ?></p>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>