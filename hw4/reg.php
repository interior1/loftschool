<?
require ('functions.php');
require ('dbconfig.php');
session_start();


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.min.css" />
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />


    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <?
            $menu = array ("Авторизация"=>"index.php", "Регистрация"=>"reg.php", "Список пользователей"=>"list.php", "Список файлов"=>"files.php");
            echo "<ul class=\"nav navbar-nav\">";
            foreach ($menu as $title=>$url) {
                $class = strpos($_SERVER["REQUEST_URI"], $url) !== false ? " class='active'" : "";
                echo "<li$class><a href='$url'>$title</a><li>";
            }
            echo "</ul>";
            ?>

        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <?php if (!$_SESSION['autorized']): ?>
    <div class="container">

      <div class="form-container">
        <form class="form-horizontal" id="reg" enctype="multipart/form-data" method="post" action="join.php">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Логин</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputEmail3" name="login" placeholder="Логин">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Пароль">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword4" class="col-sm-2 control-label">Пароль (Повтор)</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" id="inputPassword4" name="vpassword" placeholder="Пароль">
            </div>
          </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Имя</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="name" placeholder="Имя">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Описание</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="inputEmail3" name="description" placeholder="Описание">
                </div>
            </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Дата рождения</label>
                    <div class="col-sm-10">
                    <input class="form-control" id="InputDOB" placeholder="Дата рождения" name="age" type="date">
                    </div>
                </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Аватар</label>
                <div class="col-sm-10">
                    <div class="file-upload" data-text="Выберите файл">
                        <input type="file" name="photo">
                    </div>
                </div>
            </div>
            <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">Зарегистрироваться</button>
              <br><br>
              Зарегистрированы? <a href="index.php">Авторизируйтесь</a>
            </div>
          </div>
        </form>
      </div>

    </div><!-- /.container -->
    <?php else :?>
    <div class="col-sm-offset-2 col-sm-10">
        <h2>Расслабьтесь, вы уже зарегистрированы!</div></h2>
    </div>
    <?php endif;?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.min.js"></script>

  </body>
</html>
