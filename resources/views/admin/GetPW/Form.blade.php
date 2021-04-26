<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <title>Reset Password</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="text-center">
                              <h3><i class="fa fa-lock fa-4x"></i></h3>
                              <h2 class="text-center">Forgot Password?</h2>
                              <p>You can reset your password here.</p>
                              <?php
                                $message9 = Session::get('thongbao9');
                                // $canhbao = Session::get('danger');
                                if ( $message9){
                                    // echo "<font color=red>$canhbao</font>";
                                    echo "<font color=red>$message9</font>";
                                    Session::put('danger',null);
                                    Session::put('thongbao9',null);
                                }
                              ?>
                              <form method="POST">
                                  @csrf
                                <div class="panel-body">
                                      <div class="form-group">
                                        <div class="input-group">
                                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                          <input id="emailInput" placeholder="email address" class="form-control" name="admin_email" type="email" required="">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <input class="btn btn-lg btn-primary btn-block" value="Send My Password" type="submit">
                                      </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>
  

{{-- http://www.designerslib.com/bootstrap-forgot-password-templates/ --}}