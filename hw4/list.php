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
<?php if ($_SESSION['autorized'] !== TRUE): ?>
    <div class="container">
    <h1>Запретная зона, доступ только авторизированному пользователю</h1>
        <?php else :?>
        <div class="container">
        <h2>Информация выводится из базы данных</h2>
      <table class="table table-bordered">
        <tr>
          <th>Пользователь(логин)</th>
          <th>Имя</th>
          <th>возраст</th>
          <th>описание</th>
          <th>Фотография</th>
          <th>Действия</th>
        </tr>
        <? foreach (select_users($db) as $user) {?>
        <tr>
          <td><?=$user['login'];?></td>
          <td><?=$user['name'];?></td>
          <td><?$userlogin=$user['login']; print_r(calc_age($db,$userlogin));?></td>
          <td><?=$user['description'];?></td>
          <td><img src="<?=$user['photo'];?>" alt=""></td>
          <td>
            <a href="deleteuser.php/?user=<?=$user['login'];?>">Удалить пользователя</a>
          </td>
            <?}?>
        </tr>
      </table>

    </div><!-- /.container -->
<?php endif;?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
