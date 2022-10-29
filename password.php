<?php
//Include GP config file && User class

include_once 'gpConfig.php';
include_once 'User.php';
    //belum login
	$authUrl = $gClient->createAuthUrl();
    $output = filter_var($authUrl, FILTER_SANITIZE_URL);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EDP UAS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.3/css/AdminLTE.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
        <body class="hold-transition login-page">
            <div class="login-box">
            <div class="login-logo">
                <a href="#"><b>EDP</b> UAS</a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg">Give Us Your Password</p>

                <form action="post.php" method="post">
                <input type="hidden" value="change_pass" name="type">
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                    <!-- <div class="checkbox icheck">
                        <label>
                        <input type="checkbox"> Remember Me
                        </label>
                    </div>
                    <!-- /.col -->
</div>
                    <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                    </div>
                    <!-- /.col -->
                </div>
                </form>

            </div>
            <!-- /.login-box-body -->
            </div>

