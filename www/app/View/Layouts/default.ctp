<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SR</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php
    echo $this->Html->css('bootstrap.min');
    echo $this->fetch('css');
    ?>
  </head>
  <body>
<div class="container-fluid">
<div class="row">
  <div class="col-xs-18 col-md-12 page-header">header</div>
  <div class="col-xs-18 col-md-12 wrapper">
    <div class="row">
        <div class="col-xs-6 col-md-4 list-group">
              <?php echo $this->Html->link('Shops', '/shops/index/', array(
                  'class' => 'list-group-item'));
              echo $this->Html->link('Comments', '/comments/index/', array(
                  'class' => 'list-group-item'));
              echo $this->Html->link('Login', '/users/login/', array(
                  'class' => 'list-group-item'));
              echo $this->Html->link('Logout', '/users/logout/', array(
                  'class' => 'list-group-item'));
              echo $this->Html->link('Register', '/users/add/', array(
                  'class' => 'list-group-item'));
              var_dump($_COOKIE);
              ?>
            </div>
        <div class="col-xs-12 col-md-8 main-content ">
            <div class="row">
                <div class="col-xs-18 col-md-12">
                    <ol class="breadcrumb">
                        <?php
                          $currentUrl = explode('/',Router::url());
                          foreach ($currentUrl as $value) {
                              echo "<li><a href='#'>{$value}</a></li>";
                          }
                        ?>
                    </ol>
                </div>
                <div class="ccol-xs-18 col-md-12 panel panel-default">
                    <div class="panel-body">
                        <?php echo $this->Session->flash(); ?>
                        <?php echo $this->fetch('content'); ?>
                      </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <div class="col-xs-18 col-md-12 footer">footer</div>
</div>
</div>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
