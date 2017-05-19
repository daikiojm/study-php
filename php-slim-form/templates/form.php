<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.3/jquery-ui.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <title>slim</title>
  </head>
  <body>
    <div class="container theme-showcase" role="main">

<?php if (isset($flash['error'])): ?>
    <div class="alert alert-danger"><?= $flash['error'] ?></div>
<?php endif; ?>
<form method="post" action="commit">
    <div class="form-group <?php if (isset($errors['title'])): ?>has-error<?php endif; ?>">
        <label class="control-label" for="title">タイトル</label>
        <input type="text" name="title" class="form-control" id="title" value="<?php if (isset($params['title'])) { echo $params['title']; } ?>" />
        <?php if(isset($errors['title'])): ?>
            <div class="text-danger"><?= $errors['title'] ?></div>
        <?php endif; ?>
    </div>

    <div class="form-group <?php if (isset($errors['number'])): ?>has-error<?php endif; ?>">
        <label class="control-label" for="number">数値</label>
        <input type="text" name="number" class="form-control" id="number" value="<?php if (isset($params['number'])) { echo $params['number']; } ?>" />
        <?php if(isset($errors['number'])): ?>
            <div class="text-danger"><?= $errors['number'] ?></div>
        <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-primary btn-lg">登録</button>

</form>

    </div>

  </body>
</html>
