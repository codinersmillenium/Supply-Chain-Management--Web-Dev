<?php  mysql_connect("localhost","root","") or die(mysql_error());
      mysql_select_db("praktikum_prm") or die(mysql_error());
      $kota = mysql_query('SELECT * from kota');?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <!-- Bootstrap CSS -->
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
  </head>
  <body>
   <div class="container p-3">
     <div class="row">
       <h3>TABULASI DATA KONSUMEN</h3>
     </div>
     <div class="row">
       <div class="col-6 col-md-3 mt-2">
         <select class="form-control" id="kota">
           <option value="">Semua Kota</option>
           <?php while ( $row= mysql_fetch_array($kota)) {
             # code... ?>
             <option value="<?php echo $row['id_kota'] ?>"><?php echo $row['nama_kota'] ?></option>
             <?php 
             } ?>
         </select>
       </div>
       <div class="col-6 col-md-3 mt-2">
      <input type="text" class="form-control" id="nama_konsumen" placeholder="Nama Konsumen">
    </div>
     <div class="col-6 col-md-3 mt-2">
      <input type="email" class="form-control" id="email" placeholder="Email">
    </div>
     <div class="col-6 col-md-3 mt-2">
      <input type="text" class="form-control" id="handphone" placeholder="Handphone">
    </div>
     <div class="col-6 col-md-3 mt-2">
      <input type="text" class="form-control" id="alamat" placeholder="Alamat">
    </div>
     <div class="col-6 col-md-3 mt-2">
      <input type="text" class="form-control" id="tgl_awal" placeholder="Tanggal Daftar Dari">
    </div>
     <div class="col-6 col-md-3 mt-2">
      <input type="text" class="form-control" id="tgl_akhir" placeholder="Tanggal Daftar Sampai">
    </div>
     </div>
   
   <div class="row mt-5">
     <div class="col-12">
       <p>Result : <span id="count_result">0</span></p>
       <script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

       <table class="table table-hover table bordered" id="example">
         <thead>
           <tr>
             <th>No</th>
             <th>Nama</th>
             <th>Kota</th>
             <th>Alamat</th>
             <th>Handphone</th>
             <th>Email</th>
             <th>Tanggal Daftar</th>
             <th>Aksi</th>
           </tr>
         </thead>
       <tbody id="result">
         
       </tbody>
     </table>
     </div>
   </div>
 </div>

   <div class="row mt-3">
     <div class="col-xs-12">
       <nav aria-label="Page navigation">
         <ul class="pagination justify-coontent-center" id="navigation-result"></ul>
       </nav>
     </div>
   </div>
 </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="paging.js"></script>
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
      $(document).on('change','#kota,#tgl_awal,#tgl_akhir',function(e)
      {
        setTimeout(function(){
          getData(1); },
          1000);
      })
       $(document).on('keyup','#nama_konsumen,#handphone,#email,#email,#alamat',function(e)
      {
        setTimeout(function(){
          getData(1); },
          1000);
      })

       function getData(page=1)
       {
        let nama_konsumen = $("#nama_konsumen").val();
        let alamat = $("#alamat").val();
        let email = $("#email").val();
        let handphone = $("#handphone").val();
        let kota = $("#kota").val();
        let tgl_awal = $("#tgl_awal").val();
        let tgl_akhir = $("#tgl_akhir").val();

        $.ajax({
          url : 'get-data.php?page='+page,
          type : 'post',
          data : {
            nama_konsumen : nama_konsumen,
            alamat : alamat,
            email : email,
            handphone : handphone,
            kota : kota,
            tgl_awal : tgl_awal,
            tgl_akhir : tgl_akhir
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
              result += `<tr><td>${no++}</td><td>${i.nama_konsumen}</td><td>${i.nama_kota}</td><td>${i.alamat }</td><td>${i.handphone}</td><td>${i.email}</td><td>${i.tanggal_daftar}</td><td>
                <a href="#" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#updatedata${i.id_konsumen}"><svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 011.414 0l2 2a1 1 0 010 1.414l-9 9a1 1 0 01-.39.242l-3 1a1 1 0 01-1.266-1.265l1-3a1 1 0 01.242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z" clip-rule="evenodd"/>
                <path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 00.5.5H4v.5a.5.5 0 00.5.5H5v.5a.5.5 0 00.5.5H6v-1.5a.5.5 0 00-.5-.5H5v-.5a.5.5 0 00-.5-.5H3z" clip-rule="evenodd"/>
                </svg></i></a> 
        <a class="btn btn-danger btn-sm " data-toggle="modal" data-target="#deletedata${i.id_konsumen}"><svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  <path d="M5.5 5.5A.5.5 0 016 6v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm2.5 0a.5.5 0 01.5.5v6a.5.5 0 01-1 0V6a.5.5 0 01.5-.5zm3 .5a.5.5 0 00-1 0v6a.5.5 0 001 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 01-1 1H13v9a2 2 0 01-2 2H5a2 2 0 01-2-2V4h-.5a1 1 0 01-1-1V2a1 1 0 011-1H6a1 1 0 011-1h2a1 1 0 011 1h3.5a1 1 0 011 1v1zM4.118 4L4 4.059V13a1 1 0 001 1h6a1 1 0 001-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" clip-rule="evenodd"/>
</svg></a>

                        <div class="modal fade" id="deletedata${i.id_konsumen}" tabindex="-1" role="dialog"  aria-hidden="true">
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
                                <a href="function_user.php?aksi=hapuskonsumen&id=${i.id_konsumen}; ?>" class="btn btn-primary">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      
      <div class="modal fade" id="updatedata${i.id_konsumen}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel${i.id_konsumen}" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel${i.id_konsumen}">Edit Data</h4>
      </div>
      <div class="modal-body">
       

<form>
  <div class="form-group">
    <label for="nm">Nama</label>
    <input type="text" class="form-control" name="nama_konsumen" value="${i.nama_konsumen}">
  </div>
  <div class="form-group">
    <select class="form-control" name="kota">
           <option value="">${i.nama_kota}</option>
           <?php  $kota = mysql_query('SELECT * from kota'); ?>
           <?php while ( $row= mysql_fetch_array($kota)) {
             # code... 
             echo "<option value=".$row['id_kota'].">".$row['nama_kota']."</option>";
             } ?>

         </select>
  </div>
  <div class="form-group">
    <label for="pn">Alamat</label>
    <input type="text" class="form-control" name="alamat" value="${i.alamat}">
  </div>
  <div class="form-group">
    <label for="al">Handphone</label>
    <input type="text" class="form-control" name="handphone" value="${i.handphone}">
  </div>
  <div class="form-group">
    <label for="al">Email</label>
    <input type="text" class="form-control" name="email" value="${i.email}">
  </div>
 
</form>
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" onclick="updatedata('<?php echo $row['kode']; ?>')" class="btn btn-primary" data-dismiss="modal">Save changes</button>
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
    <script type="text/javascript">
    function deletedata(delete_url)
    {
      $('#modal_delete').modal('show', {backdrop: 'static'});
      document.getElementById('delete_link').setAttribute('href' , delete_url);
    }
</script>
  </body>
</html>