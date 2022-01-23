<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Quarantine | Quiz</title>
        <link rel="icon" href="<?= base_url('assets/welcome/img/notification.png'); ?>" type="image/x-icon">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <link href="<?= base_url('assets/internal/css/adminlte.css'); ?>" rel="stylesheet">
        <script> var baseurl = '<?= base_url(); ?>';</script>
        <style type="text/css">
            .lockscreen-wrapper{padding-top:0; width:650px;}
            .lockscreen-footer{bottom:70px;}
            .quizresult{display:flex; height:250px; border:2px dashed #001226; margin-top:20px;}
            .quizspin,.quizname{margin:auto; text-align:center;}
            .quizname{display:none;}
        </style>
    </head>
    <body class="hold-transition lockscreen">
        <div class="lockscreen-wrapper">
            <div class="page-content-wrapper">
                <div class="section-space">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <div class="jumbotron text-center">
                                    <h1 class="display-3 text-dark font-weight-bold">Quarantine Quiz!</h1>
                                    <i class="fa fa-question text-danger text-my" aria-hidden="true"></i>
                                    <h5>This AI Algorithm will select the winner of our Quarantine Quiz!<br>Hope you are enjoying...!</h5>
                                    <a href="<?= base_url('welcome/quiz.html'); ?>" class="btn btn-info mt-md-4"><i class="fa fa-gift"></i>&nbsp;&nbsp;Winner</a>
                                    <div class="quizresult">
                                        <h1 class="quizspin text-danger"><i class="fa fa-cog fa-spin fa-2x"></i></h1>
                                        <h1 class="quizname text-danger"><?= isset($winname) ? $winname : ''; ?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lockscreen-footer text-center">
                <p>Copyright &copy; <b><a href="<?= base_url(); ?>" class="text-black">Murshid</a></b> - <?= date('Y'); ?><br>All Rights Reserved.</p>
            </div>
        </div>
    </body>
    <script type="text/javascript">
        $(document).ready(function () {
            setTimeout(function () {
                $('.quizspin').hide(1500);
                $('.quizname').show(1500);
            }, 1500);
        });
    </script>
</html>