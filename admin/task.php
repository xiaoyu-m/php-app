<!DOCTYPE html>
<html lang="zh">

<head>
  <title>任务管理</title>
  <?php
    include_once '../components/publicHeader.php';
  ?>
  <link rel="stylesheet" href="/assets/css/task.css">
  <style>
    .input-err{
      color: #EF5552!important
    }
  </style>
</head>

<body>
<div class="tipbox"> </div>

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
          <h2 class="p-2 content-title">任务管理</h2>
          <nav class="container-fluid float-right" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">后台管理</a></li>
              <li class="breadcrumb-item active" aria-current="page">任务管理</li>
            </ol>
          </nav>
        </div>
        <div class="container-fluid " id="index-total">
          <div class="row">
            <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
              <div id="myTab" class="btn-group mr-2 nav nav-tabs" role="group" aria-label="First group">
                <a href="#task" class="btn btn-light active changeTask" data-toggle="tab">
                  任务管理
                </a>
                <a href="#partjob" class="btn btn-light changePartjob" data-toggle="tab">兼职管理</a>
              </div>
            </div>
          </div>
          <div class="tab-content">
            <div class="tab-pane in active col-12" id="task">
              <div class="row">
              </div>
            </div>
            <div class="tab-pane fade col-12" id="partjob">
              <div class="row">
                <div class="col-6 col-lg-3 col-md-4">
                  <div class="card ">
                    <div class="card-body">
                      <form>
                        <div class="form-group">
                          <label>员工编号:</label>
                          <input type="text" class="form-control" name="empNo">
                        </div>
                        <div class="form-group">
                          <label>兼职信息:</label>
                          <textarea class="form-control" name="taskInfo" aria-label="With textarea" value="${taskInfo}"></textarea>
                        </div>
                        <div class="form-group">
                          <label>津贴:</label>
                          <input type="text" class="form-control" name="jobInfo">
                        </div>
                      </form>
                      <button type="button" class="float-right btn btn-success" >
                        <i class="iconfont icon-tianjia"></i>
                        <b>发布兼职</b>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
<script src="/assets/js/task.js"></script>
</html>