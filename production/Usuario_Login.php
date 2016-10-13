

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>TPE! | </title>

        <!--     Bootstrap 
            <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
             Font Awesome 
            <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
             NProgress 
            <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
             iCheck 
            <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
             bootstrap-wysiwyg 
            <link href="../vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
             Select2 
            <link href="../vendors/select2/dist/css/select2.min.css" rel="stylesheet">
             Switchery 
            <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
             starrr 
            <link href="../vendors/starrr/dist/starrr.css" rel="stylesheet">
        
             Custom Theme Style 
            <link href="../build/css/custom.min.css" rel="stylesheet">-->
        <!-- Bootstrap -->
        <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- Ion.RangeSlider -->
        <link href="../vendors/normalize-css/normalize.css" rel="stylesheet">
        <link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
        <link href="../vendors/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
        <!-- Bootstrap Colorpicker -->
        <link href="../vendors/mjolnic-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css" rel="stylesheet">

        <link href="../vendors/cropper/dist/cropper.min.css" rel="stylesheet">

        <!-- Login -->
        <link href="../production/css/Usuario_Login.css" rel="stylesheet">
        
        <!-- Custom Theme Style -->
        <link href="../build/css/custom.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <div class="card card-container">
                <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
                <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
                <p id="profile-name" class="profile-name-card"></p>
                <form class="form-signin" action="Usuario_Login_ajax.php" method="post">
                    <span id="reauth-email" class="reauth-email"></span>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" required autofocus>
                    <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required>
<!--                    <div id="remember" class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div>-->
                    <button id="btnLogin" name="btnLogin" class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Fazer login</button>
                </form><!-- /form -->
                <a href="#" class="forgot-password">
                    Esqueceu a senha?
                </a>
            </div><!-- /card-container -->
        </div><!-- /container -->
        
        <script src="Usuario_Login_ajax.js"></script>
        
    </body>
</html>

