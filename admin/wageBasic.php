<!DOCTYPE html>
<html lang="zh">

<head>
  <title>基本工资</title>
  <?php
    include_once '../components/publicHeader.php';
  ?>
</head>

<body>
  <div id="root">
  <div class="tipbox">
  </div>
  <div class="modal mt-5"  id="addModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">新增工资信息</h5>
          <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addForm">
            <div class="input-group input-group-sm">
              <div class="col-12">
                <label for="#empNo">
                  员工编号：
                </label>
                <input type="text" name="empNo" class="form-control" id="empNo">
              </div>
            </div>
            <div class="input-group input-group-sm">
              <div class="col-12">
                <label for="#name">
                  姓名：
                </label>
                <input type="text" name="name" class="form-control" id="name">
              </div>
            </div>
            <div class="input-group input-group-sm">
              <div class="col-12">
                <label for="#basicWage">
                  基本工资：
                </label>
                <input type="text" name="basicWage" class="form-control" id="basicWage">
              </div>
            </div>
            <div class="input-group input-group-sm">
              <div class="col-12">
                <label for="#jobWage">
                  岗位工资：
                </label>
                <input type="text" name="jobWage" class="form-control" id="jobWage">
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">
            取消
          </button>
          <button type="button" class="btn btn-primary addBtn">添加</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal mt-5"  id="viewModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">基本工资</h5>
          <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary close-btn" data-dismiss="modal">
            确定
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal mt-5"  id="editModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">编辑基本工资</h5>
          <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">
            取消
          </button>
          <button type="button" class="btn btn-primary editBtn">编辑</button>
       </button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal mt-5"  id="delModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">删除工资</h5>
          <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
          <div class="modal-body">
          
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">
            取消
          </button>
          <button type="button" class="btn btn-primary delBtn">确认</button>
        </div>
      </div>
    </div>
  </div>
    <?php
      include_once '../components/navSider.php';
    ?>
    <section>
      <?php
      include_once '../components/header.php';
    ?>
      <div class="content"><div class="container-fluid  ">
          <h2 class="pb-2 content-title">基本工资管理</h2>
          <nav class="container-fluid float-right" aria-label="breadcrumb">
            <!-- 面包屑导航  -->
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">后台管理</a></li>
              <li class="breadcrumb-item active" aria-current="page">基本工资管理</li>
            </ol>
          </nav>
        </div>
        <div class="container-fluid" id="index-total">
          <div>
          <div class="row">
            <div class=" col-12" style="width: 18rem;">
              <div class="card">
                <div class="card-body">
                  <div class="card-title">
                    <button type="button" class="add add-dept btn btn-primary" data-toggle="modal" data-target="#addModal">
                      <i class="iconfont icon-tianjia"></i>
                      <b> 添加工资</b>
                    </button>
                  </div>
                    <div class="card-text">
                      <table class="emp-list table table-hover table-condensed">
                        <thead>
                          <tr>
                          <th>#</th>
                          <th>员工编号</th>
                          <th>姓名</th>
                          <th>基本工资</th>
                          <th>岗位工资</th>
                          <th class="caozuo">操作</th>
                        </tr>
                      </thead>
                      <tbody></tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        </div></div>
    </section>
  </div>
</body>
<?php
  include_once '../components/publicFooter.php';
?>
<script src="/assets/js/wageBasic.js"></script>

</html>