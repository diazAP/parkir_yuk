<?php $data['title'] = $title; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?= view('_partial/head', $data); ?>
</head>

<body id="page-top">
    <div id="wrapper">
        <?= view('_partial/sidebar'); ?>
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <?= view('_partial/topbar'); ?>
                <?= view('_partial/toastr'); ?>
                <div class="container-fluid">
                    <?= view('_partial/breadcrumb'); ?>
                    <?= view($main_view); ?>
                </div>
            </div>
            <?= view('_partial/footer'); ?>
        </div>
    </div>
    <?= view('_partial/scrolltotop'); ?>
    <?= view('_partial/logoutmodal'); ?>
    <?= view('_partial/js'); ?>
</body>

</html>