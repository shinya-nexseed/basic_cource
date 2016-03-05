<?php
    define('PDO_DSN', 'mysql:dbname=oneline_bbs;host=localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');

    $dbh = new PDO(PDO_DSN,DB_USERNAME,DB_PASSWORD);
    $dbh->query('SET NAMES utf8');

    if(isset($_POST) && !empty($_POST)){

        $nickname = $_POST['nickname'];
        $comment = $_POST['comment'];
        $sql = sprintf('INSERT INTO posts SET id=NULL, nickname="%s", comment="%s", created=NOW()',$nickname,$comment);
        
        $stmt = $dbh->prepare($sql);
        $stmt->execute();
    }

    $sql = 'SELECT * FROM posts ORDER BY created DESC';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $dbh = null;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>セブ掲示版</title>

  <!-- CSS -->
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="assets/css/form.css">
  <link rel="stylesheet" href="assets/css/timeline.css">
  <link rel="stylesheet" href="assets/css/main.css">
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#page-top"><span class="strong-title"><i class="fa fa-linux"></i> Oneline bbs</span></a>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <!-- <li class="hidden">
            <a href="#page-top"></a>
          </li>
          <li class="page-scroll">
            <a href="#portfolio">Portfolio</a>
          </li>
          <li class="page-scroll">
            <a href="#about">About</a>
          </li>
          <li class="page-scroll">
            <a href="#contact">Contact</a>
          </li> -->
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
  </nav>

  <div class="container">
    <div class="row">

      <div class="col-md-4 content-margin-top">
        <!-- つぶやきフォーム -->
        <form action="bbs_comp.php" method="post">

          <div class="form-group">
            <div class="input-group">
              <input type="text" name="nickname" class="form-control" id="validate-text" placeholder="ニックネーム" required>
              <span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
            </div>
          </div>

          <div class="form-group">
            <div class="input-group" data-validate="length" data-length="4">
              <textarea type="text" class="form-control" name="comment" id="validate-length" placeholder="つぶやき" required></textarea>
              <span class="input-group-addon danger"><span class="glyphicon glyphicon-remove"></span></span>
            </div>
          </div>

          <button type="submit" class="btn btn-primary col-xs-12" disabled>つぶやく</button>
        </form>
      </div>

      <div class="col-md-8 content-margin-top">
        <!-- つぶやき一覧表示 -->
        <div class="timeline-centered">

          <!-- while文開始 -->
          <?php while($rec = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
          <article class="timeline-entry">
            <div class="timeline-entry-inner">
              <div class="timeline-icon bg-success">
                <i class="entypo-feather"></i>
                <i class="fa fa-cogs"></i>
              </div>
              <div class="timeline-label">
                <h2><a href="#"><?php echo $rec['nickname']; ?></a> <span><?php echo $rec['created']; ?></span></h2>
                <p><?php echo $rec['comment']; ?></p>
              </div>
            </div>
          </article>
          <?php endwhile; ?>
          <!-- while文終了 -->

          <article class="timeline-entry begin">
            <div class="timeline-entry-inner">
              <div class="timeline-icon" style="-webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg);">
                <i class="entypo-flight"></i> +
              </div>
            </div>
          </article>
          
        </div>
      </div>

    </div>
  </div>

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="assets/js/bootstrap.js"></script>
  <script src="assets/js/form.js"></script>
</body>
</html>
