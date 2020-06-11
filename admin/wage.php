<!DOCTYPE html>
<html lang="zh">

<head>
  <title>工资管理</title>
  <?php
    include_once '../components/publicHeader.php';
  ?>
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
        <div class="container-fluid ">
          <h2 class="p-2 content-title">工资管理</h2>
          <nav class="container-fluid float-right" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">后台管理</a></li>
              <li class="breadcrumb-item active" aria-current="page">工资管理</li>
            </ol>
          </nav>
        </div>
        <div class="container-fluid " id="index-total">
          <div class="bg-white p-4">

            <button type="button" class="btn btn-danger">工资管理</button>
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