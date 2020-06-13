<!DOCTYPE html>
<html lang="zh">

<head>
  <title>员工管理</title>
  <?php
    include_once '../components/publicHeader.php';
  ?>
</head>

<body>
  <!-- 添加员工 -->
  <div class="tipbox"> </div>
  <div class="modal mt-5"  id="addEmpModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">添加员工</h5>
          <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addEmpForm">
            <div class="input-group input-group-sm">
              <div class="col-12">
                <label for="#empName">
                  姓名：
                </label>
                <input type="text" name="empName" class="form-control" id="empName">
              </div>
            </div>
            <div class="input-group input-group-sm">
              <div class="col-6">
                <label for="#sex">
                  性别：
                </label>
                <select class="form-control" name="sex" id="sex">
                  <option value="男">男</option>
                  <option value="女">女</option>
                </select>
              </div>
              <div class="col-6">
                <label for="#age">
                  年龄：
                </label>
                <input type="text" name="age" class="form-control" id="age">
              </div>
            </div>
            <div class="input-group input-group-sm">
              <div class="col-6">
                <label for="#dept">
                  部门：
                </label>
                <select class="form-control" name="dept" id="dept">
                  <option value="技术部">技术部</option>
                  <option value="事业部">事业部</option>
                  <option value="服务部">服务部</option>
                  <option value="管理部">管理部</option>
                </select>
              </div>
              <div class="col-6">
                <label for="#jobTitle">
                  职称：
                </label>
                <select class="form-control" name="jobTitle" id="jobTitle">
                  <option value="前端">前端</option>
                  <option value="后端">后端</option>
                  <option value="数据库">数据库</option>
                  <option value="美化">美化</option>
                  <option value="宣传">宣传</option>
                  <option value="宣传">宣传</option>
                </select>
              </div>
            </div>
            <div class="input-group input-group-sm">
              <div class="col-12">
                <label for="#native">
                  籍贯：
                </label>
                <input type="text" name="native" class="form-control" id="native">
              </div>
            </div>
            <div class="input-group input-group-sm">
              <div class="col-6">
                <label for="#state">
                  状态：
                </label>
                <select class="form-control" name="state" id="state">
                  <option>在职</option>
                  <option>离职</option>
                </select>
              </div>
              <div class="col-6">
                <label for="#likes" >
                  爱好：
                </label>
                <input type="text" name="likes" class="form-control" id="likes">
              </div>
            </div>
            <div class="input-group input-group-sm">
              <div class="col-12">
                <label for="#remark" >
                  备注：
                </label>
                  <textarea class="form-control" name="remark" id="remark" aria-label="With textarea"></textarea>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">
            取消
          </button>
          <button type="button" class="btn btn-primary addEmpBtn">添加</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal mt-5"  id="viewEmpModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">员工列表</h5>
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
  <div class="modal mt-5"  id="editEmpModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">编辑员工</h5>
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
          <button type="button" class="btn btn-primary editEmpBtn">编辑</button>
       </button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal mt-5"  id="delEmpModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">删除员工</h5>
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
          <button type="button" class="btn btn-primary delEmpBtn">确认</button>
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
        <div class="container-fluid ">
          <h2 class="pb-2 content-title">员工管理</h2>
          <nav class="container-fluid float-right" aria-label="breadcrumb">
            <!-- 面包屑导航  -->
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">后台管理</a></li>
              <li class="breadcrumb-item active" aria-current="page">员工管理</li>
            </ol>
          </nav>
        </div>
        <div class="container-fluid " id="index-total">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="card-title">
                      <button type="button" class="add add-emp btn btn-primary" data-toggle="modal" data-target="#addEmpModal">
                        <i class="iconfont icon-tianjia"></i>
                        <b> 添加员工</b>
                      </button>
                  </div>
                  <div class="cord-text table-responsive">
                    <table class="emp-list table table-hover table-condensed">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>姓名</th>
                          <th>性别</th>
                          <th>年龄</th>
                          <th>部门</th>
                          <th>职称</th>
                          <th>籍贯</th>
                          <th>状态</th>
                          <th>爱好</th>
                          <th>备注</th>
                          <th class="caozuo">操作</th>
                        </tr>
                      </thead>
                      <tbody></tbody>
                    </table>
                    <div class="col-12">
                      <nav aria-label="Page navigation text-rigth example">
                        <ul class="pagination">
                          <li class="page-item"><b class="page-link iconfont icon-zuo"></b></li>
                          <li class="page-item active"><b class="page-link" >1</b></li>
                          <li class="page-item"><b class="page-link" >2</b></li>
                          <li class="page-item"><b class="page-link" >3</b></li>
                          <li class="page-item"><b class="page-link iconfont icon-you"></b></li>
                        </ul>
                      </nav>
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

<script src="/assets/js/emp.js"></script>
</html>