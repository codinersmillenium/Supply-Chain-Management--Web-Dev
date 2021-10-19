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
      $bbk = mysql_query('SELECT * from kategoribbk');?>
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
              <img src="../asset/dist/img/Gudang1-128x128.jpg" alt="Gudang Avatar" class="img-size-50 mr-3 img-circle">
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
              <img src="../asset/dist/img/Gudang8-128x128.jpg" alt="Gudang Avatar" class="img-size-50 img-circle mr-3">
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
              <img src="../asset/dist/img/Gudang3-128x128.jpg" alt="Gudang Avatar" class="img-size-50 img-circle mr-3">
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
            <i class="fas fa-Gudangs mr-2"></i> 8 friend requests
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
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Data Gudang
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="datagudang.php" class="nav-link active">
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
            <a href="datasupplier.php" class="nav-link">
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
            <h1 class="m-0 text-dark">Data Gudang</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Gudang</li>
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
         <select class="form-control" id="kategori">
           <option value="">Semua</option>
           <?php while ( $row= mysql_fetch_array($bbk)) {
             # code... ?>
             <option value="<?php echo $row['idkategoriBBK'] ?>"><?php echo $row['jenisBBK'] ?></option>
             <?php 
             } ?>
         </select>
       </div>
       <div class="col-6 col-md-3 mt-2">
      <input type="text" class="form-control" id="nama" placeholder="Nama Bahan Baku">
    </div>
     <div class="col-6 col-md-3 mt-2">
    </div>
     <div class="col-6 col-md-3 mt-2">
    </div>
    <div class="col-6 col-md-3 mt-2">
      <input type="email" class="form-control" id="harga_awal" placeholder="Dari Harga">
    </div>
     <div class="col-6 col-md-3 mt-2">
      <input type="text" class="form-control" id="harga_akhir" placeholder="Sampai Harga">
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
                    <th>Nama Bahan Baku</th>
                    <th>Jenis</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Satuan</th>
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
      $(document).on('change','#kategori,#harga_awal,#harga_akhir',function(e)
      {
        setTimeout(function(){
          getData(1); },
          1000);
      })
       $(document).on('keyup','#nama',function(e)
      {
        setTimeout(function(){
          getData(1); },
          1000);
      })

       function getData(page=1)
       {
        let idbbk = $("#idbbk").val();
        let namaBBK = $("#nama").val();
        let jumlahstok = $("#jumlahstok").val();
        let harga_awal = $("#harga_awal").val();
        let harga_akhir = $("#harga_akhir").val();
        let satuan = $("#satuan").val();
        let jenisBBK = $("#kategori").val();

        $.ajax({
          url : 'get-data.php?page='+page,
          type : 'post',
          data : {
            idbbk : idbbk,
            nama : namaBBK,
            jumlahstok : jumlahstok,
            harga_awal: harga_awal,
            harga_akhir : harga_akhir,
            satuan : satuan,
            kategori : jenisBBK,
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
                result += `<tr><td>${no++}</td><td>${i.namaBBK}</td><td>${i.kategori}</td><td>${i.jumlahstok }</td><td>${i.harga}</td><td>${i.satuan}</td><td>
                <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#updatedata${i.idbbk}"><svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"/>
                <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 00.5.5H4v.5a.5.5 0 00.5.5H5v.5a.5.5 0 00.5.5H6v-1.5a.5.5 0 00-.5-.5H5v-.5a.5.5 0 00-.5-.5H3z" clip-rule="evenodd"/>
                </svg></i></a>
        <a class="btn btn-danger btn-sm " data-toggle="modal" data-target="#deletedata${i.idbbk}"><svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" clip-rule="evenodd"/>
</svg></a>                                 
<div class="modal fade" id="deletedata${i.idbbk}" tabindex="-1" role="dialog"  aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-header">
        <h5 class="modal-title" >Hapus Data</h5>
      </div>
                              <div class="modal-body">
                                <h4 align="center" >Apakah anda yakin ingin menghapus data?</h4>
                              </div>
                              <div class="modal-footer">
                                <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancle</button>
                                <a href="CRUD/hapus.php?id=${i.idbbk}" class="btn btn-primary">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>
<div class="modal fade" id="updatedata${i.idbbk}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel${i.idbbk}" aria-hidden="true">
 <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" >Edit Data</h5>
      </div>
                              <div class="modal-body">
                                <form action="CRUD/update.php" method="POST">
<input type="hidden" class="form-control" name="idbbk" value="${i.idbbk}">
  <div class="form-group">
    <label >Nama</label>
    <input type="text" class="form-control" name="nama" value="${i.namaBBK}">
  </div>
  <div class="form-group">
    <label >Harga</label>
    <input type="text" class="form-control" name="harga" value="${i.harga}">
  </div>
  <div class="form-group">
    <label >Satuan</label>
    <input type="text" class="form-control" name="satuan" value="${i.satuan}">
  </div>
 
<div class="form-group">
<label >Supplier</label>
    <select class="form-control" name="supplier">
           <option value="">${i.supplier}</option>"
           <?php  $kota = mysql_query('SELECT * from user where idrole=7'); ?>
           <?php while ( $row= mysql_fetch_array($kota)) {
             # code... 
             echo "<option value=".$row['iduser'].">".$row['nama']."</option>";
             } ?>

         </select>
  </div>
 <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
</form>
                              </div>
                            </div>
                          </div>
                        </div>
            
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
