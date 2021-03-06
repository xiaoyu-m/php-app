<!DOCTYPE html>
<html lang="zh">

<head>
  <title>后台管理</title>
  <?php
    include_once '../components/publicHeader.php';
  ?>
  <style>
    #home-total {
      height: calc(100vh - 120px);
      padding-top: 0!important;
    }
    #home-total > div:first-child{
      height: calc(100vh - 120px);
    }
    .align-middle{
      position: absolute;
      left: 50%;
      top: 50%;
      margin-left: -85px;
      margin-top:-50px;
      vertical-align: middle;
      text-align: center; 
      font-size: 32px;
    }
  </style>
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
      <div class="content p-4" id="home-total">
          <div class="container-fluid bg-white p-4">
            <div class="align-middle">
                <p class="border-bottom">xiaoyu</p>
              <p><b>后台管理系统</b></p>
            </div>
          </div>
          <?php
            include_once '../components/footer.php';
          ?>
        </div>
      </div>
    </section>
  </div>
</body>
<?php
  include_once '../components/publicFooter.php';
?>

</html>