<!DOCTYPE html>
<html lang="zh">

<head>
  <title>任务管理</title>
  <?php
    include_once '../components/publicHeader.php';
  ?>
  <link rel="stylesheet" href="/assets/css/task.css">
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
            <div class="btn-toolbar col-12" role="toolbar" aria-label="Toolbar with button groups">
              <div id="myTab" class="btn-group mr-2 nav nav-tabs" role="group" aria-label="First group">
                <a href="#task" class="btn btn-light active changeTask" data-toggle="tab">
                  任务管理
                </a>
                <a href="#partjob" class="btn btn-light changePartjob" data-toggle="tab">兼职管理</a>
              </div>
            </div>
          </div>
          <div class="row tab-content">
            <div class="tab-pane in active col-6" id="task">
              <div  class="card">
                <div class="card-body" >
                  <form id="addtaskForm">
                    <div class="input-group input-group-sm">
                      <label for="taskType">
                        任务类别：
                      </label>
                      <input type="text" class="form-control" name="taskType" id="taskType">
                    </div>
                    <div class="input-group input-group-sm">
                      <label for="taskName">
                        任务名称：
                      </label>
                      <input type="text" class="form-control" name="taskName" id="taskName">
                    </div>
                    <div class="input-group input-group-sm">
                      <label for="taskInfo">
                       任务详情：
                      </label>
                      <input type="text" class="form-control" name="taskInfo" id="taskInfo">
                    </div>
                    <div class="input-group input-group-sm">
                      <label for="taskNum">
                       绩效分：
                      </label>
                      <input type="text" class="form-control" name="taskNum" id="taskNum">
                    </div>
                    <div class="input-group input-group-sm">
                      <label for="taskNum">
                       绩效分/元：
                      </label>
                      <input type="text" class="form-control" name="taskNum" id="taskNum">
                    </div>
                  </form>
                  <button type="button" class="float-right btn btn-primary" data-toggle="modal" data-target="#addEmpModal">
                    <i class="iconfont icon-tianjia"></i>
                    <b>派发任务</b>
                  </button>
                </div>
              </div>
            </div>
            <div class="tab-pane fade col-6" id="partjob">
              <div class=" card rounded">
                <div class="card-body">
                    <button type="button" class="float-right btn btn-primary" data-toggle="modal" data-target="#addEmpModal">
                      <i class="iconfont icon-tianjia"></i>
                      <b>发布兼职</b>
                    </button>
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