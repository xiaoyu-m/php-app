<!DOCTYPE html>
<html lang="zh">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="/assets/images/favicon.ico" />
  <title>统计</title>
  <link rel="stylesheet" href="/assets/css/public/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/icon/sider/iconfont.css">
  <link rel="stylesheet" href="/assets/css/index.css">
</head>

<body>
  <div id="root">
    <?php
      include_once '../components/navSider.php';
    ?>
    <section>
      <?php
      include_once '../components/header.php';
    ?>
      <div class="content">
        <div>
          <h2 class="p-3 pl-4 content-title">统计</h2>
          <nav class="container-fluid float-right" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">后台管理</a></li>
              <li class="breadcrumb-item active" aria-current="page">统计</li>
            </ol>
          </nav>
        </div>
        <div class="container-fluid " id="index-total">
          <div class="bg-white p-4">
            <button type="button" class="btn btn-danger">统计</button>
          </div>
        </div>
          <?php
            include_once '../components/footer.php';
          ?>
      </div>
    </section>
  </div>
</body>
<?php
  include_once '../components/publicFooter.php';
?>

</html>