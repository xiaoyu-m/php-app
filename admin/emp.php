<!DOCTYPE html>
<html lang="zh">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="/assets/images/favicon.ico" />
  <title>员工管理</title>
  <link rel="stylesheet" href="/assets/css/public/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/icon/sider/iconfont.css">
  <link rel="stylesheet" href="/assets/css/index.css">
</head>

<body>
  <!-- 添加员工 -->
<div class="modal mt-5 fade "  id="addEmpModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">添加员工</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="addEmp">
        <div class="form-group">
          <div class="row">
            <div class="col-2 text-right">
              <label for="#empname">
                姓名：
              </label>
            </div>
          <div class="col-9">
            <input type="text" class="form-control" id="empName">
          </div>
          </div>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
        <button type="button" class="btn btn-primary">添加</button>
      </div>
    </div>
  </div>
  </div>
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
          <h2 class="p-3 pl-4 content-title">员工管理</h2>
          <nav class="container-fluid float-right" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">后台管理</a></li>
              <li class="breadcrumb-item active" aria-current="page">员工管理</li>
            </ol>
          </nav>
        </div>
        <div class="container-fluid " id="index-total">
          <div class="bg-white p-4">
            <button type="button" class="add add-emp btn btn-primary" data-toggle="modal" data-target="#addEmpModal">
              <i class="iconfont icon-tianjia"></i>
              <b> 添加员工</b>
            </button>
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