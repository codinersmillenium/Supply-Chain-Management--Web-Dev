<?php
session_start();
if(!isset($_SESSION['username'])) {
header('location:../../login.php'); 
} else { 
$role = $_SESSION['role'];
if ($role != 'Gudang') 
{
  session_destroy();
  header("Location:../../login.php?error=anda tidak memiliki hak akses dihalaman ini");
}
else
  {
$username = $_SESSION['username']; 
$role = $_SESSION['role'];
  }
}
?>
<?php  mysql_connect("localhost","root","") or die(mysql_error());
      mysql_select_db("responsi_prm") or die(mysql_error());
      $jabatan = mysql_query('SELECT * from roleuser where id_role=7');?>
<!DOCTYPE html>
<html>
<head>
 <?php include 'part/header.php'; ?>
 
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../asset/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../asset/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../asset/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="../../logout.php" role="button">
          <i>Logout</i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../../asset/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../asset/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="../index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Data Gudang
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="datagudang.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Inventory</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="CRUD/Forminput.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bahan Baku Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="CRUD/Formoutput.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Bahan Baku Keluar</p>
                </a>
              </li>
            </ul>
             <li class="nav-item has-treeview">
            <a href="datasupplier.php" class="nav-link active">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Data Supplier
              </p>
            </a>
          </li>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
       <div class="col-6 col-md-3 mt-2">
         <select class="form-control" id="jabatan">
           <option value="">Semua</option>
           <?php while ( $row= mysql_fetch_array($jabatan)) {
             # code... ?>
             <option value="<?php echo $row['id_role'] ?>"><?php echo $row['nama_role'] ?></option>
             <?php 
             } ?>
         </select>
       </div>
       <div class="col-6 col-md-3 mt-2">
      <input type="text" class="form-control" id="nama" placeholder="Nama Supplier">
    </div>
     <div class="col-6 col-md-3 mt-2">
    </div>
     <div class="col-6 col-md-3 mt-2">

    </div>
    <div class="col-6 col-md-3 mt-2">
      <input type="email" class="form-control" id="email" placeholder="Email">
    </div>
     <div class="col-6 col-md-3 mt-2">
      <input type="text" class="form-control" id="alamat" placeholder="Alamat">
    </div>
     </div>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
              <!-- /.card-header -->

    <div class="card-body">
                <table class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Supplier</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody id="result">
                  
                  </tbody>
                </table>
                  <div class="row mt-3">
        <div class="col-xs-12">
        <nav aria-label="Page navigation">
           <ul class="pagination justify-coontent-center" id="navigation-result"></ul>
        </nav>
        </div>
      </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.5
    </div>
  </footer>
 
      </div>
    </div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php include('part/footer.php'); ?>
    <script type="text/javascript">
      $(document).ready(function(e)
      {
        getData(1);
      })
      $(document).on('click','.nav-btn',function(e)
      {
        let page= $(this).data('page');
        getData(page);
      })
      $(document).on('change','#jabatan',function(e)
      {
        setTimeout(function(){
          getData(1); },
          1000);
      })
       $(document).on('keyup','#nama,#username,#email,#email,#alamat',function(e)
      {
        setTimeout(function(){
          getData(1); },
          1000);
      })

       function getData(page=1)
       {
        let iduser = $("#iduser").val();
        let nama = $("#nama").val();
        let alamat = $("#alamat").val();
        let email = $("#email").val();
        let nama_role = $("#jabatan").val();
        let idrole = $("#idrole").val();
        let username = $("#username").val();
        let password = $("#password").val();

        $.ajax({
          url : 'get-sup.php?page='+page,
          type : 'post',
          data : {
            id : iduser,
            nama : nama,
            alamat : alamat,
            email : email,
            jabatan : nama_role,
            username : username,
            password : password,
            idrole : idrole
          },
          beforeSend : function(e)
          {
            $("#result").html('<tr> <td class="text-center" colspan="7">Memproses ....<td><tr>');
          },

          success : function(xhr)
          {
            console.log(xhr.data);
            let result= '';
            let no = ((xhr.current_page-1)*xhr.per_page)+1;
            if (xhr.data.length>0) {
              $.each(xhr.data,function(d,i)
              {
                result += `<tr><td>${no++}</td><td>${i.nama}</td><td>${i.alamat}</td><td>${i.email }</td><td>
                <a href="../mailbox/send.php?id=${i.iduser }" class="btn btn-warning btn-sm" ><i class="nav-icon far fa-envelope"></i>Send</a>                                 
                </td></tr>`;
            })
            }else{
              result = "<tr> <td class='text-center' colspan='7'>Tidak ada hasil<td><tr>";
            }
            path = xhr.path;
            currentpage=xhr.current_page;
            total = xhr.total;
            perpage = xhr.per_page;
            prevpage = (currentpage<= 1) ? "1" : currentpage-1;
            prevpage = (prevpage > total) ? total-1: prevpage;
            nextpage = (currentpage>= total) ? total : currentpage+1;
            nextpage = (currentpage< 1) ? 2 : nextpage;
            firstpage = 1;
            lastpage = xhr.total;
            if (xhr.data.length > 0) {
              pagination(path,currentpage,prevpage,nextpage,firstpage,lastpage,total,perpage);
            }
            $("#result").html(result);
            $("#count_result").text(xhr.total);
          }
        })
       }
    </script>
</body>
</html>
