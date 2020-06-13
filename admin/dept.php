<!DOCTYPE html>
<html lang="zh">

<head>
  <title>部门管理</title>
  <?php
    include_once '../components/publicHeader.php';
  ?>
  <style>
    .row{
      width: 100%;
    }
  </style>
</head>
<body>
  <!-- 添加部门 -->
  <div class="tipbox"></div>
  <div class="modal mt-5"  id="addModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">添加部门</h5>
          <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addForm">
            <div class="input-group input-group-sm">
              <div class="col-12">
                <label for="#deptNo">
                  部门编号：
                </label>
                <input type="text" name="deptNo" class="form-control" id="deptNo">
              </div>
            </div>
            <div class="input-group input-group-sm">
              <div class="col-12">
                <label for="#deptName">
                  部门名称：
                </label>
                <input type="text" name="deptName" class="form-control" id="deptName">
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
          <h5 class="modal-title">部门列表</h5>
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
          <h5 class="modal-title">编辑部门</h5>
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
          <h5 class="modal-title">删除部门</h5>
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
  <div id="root">
    <?php
    include_once '../components/navSider.php';
    ?>
    <section>
    <?php
    include_once '../components/header.php';
    ?>
      <div class="content">
        <div class="container-fluid">
          <h2 class="pb-2 content-title">部门管理</h2>
          <nav class="container-fluid float-right" aria-label="breadcrumb">
            <!-- 面包屑导航  -->
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">后台管理</a></li>
              <li class="breadcrumb-item active" aria-current="page">部门管理</li>
            </ol>
          </nav>
        </div>
        <div class="container-fluid" id="index-total">
          <div >
          <div class="row">
            <div class="col-md-8 col-12" style="width: 18rem;">
              <div class="card">
                <div class="card-body">
                  <div class="card-title">
                    <button type="button" class="add add-dept btn btn-primary" data-toggle="modal" data-target="#addModal">
                      <i class="iconfont icon-tianjia"></i>
                      <b> 添加部门</b>
                    </button>
                  </div>
                    <div class="card-text  table-responsive">
                      <table class="emp-list table table-hover table-condensed">
                        <thead>
                          <tr>
                          <th>#</th>
                          <th>部门编号</th>
                          <th>部门</th>
                          <th class="caozuo">操作</th>
                        </tr>
                      </thead>
                      <tbody></tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 col-12" style="width: 18rem;">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href="#" class="card-link">Card link</a>
                  <a href="#" class="card-link">Another link</a>
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
<script src="/assets/js/dept.js"></script>

</html>