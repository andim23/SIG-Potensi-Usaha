<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("lib_func.php"); ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Geografis Potensi Usaha</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<!-- AWAL CONTENT  -- hapus dari sini kebawah (sampai AKHIR CONTENT) -->
    <table width="100%" align="center" border=0 > 
      <tr>
        <td colspan=2 align="center" >
          <?php header_web();?>
        </td>
      </tr>
      <tr> 
        <td width="250px" valign="top">
          <?php menu();?>
        </td> 
        <td valign="top" >
          <table class="table table-striped" align="center">
            <tr>
              <td align="left" width="300px">
                <a href="pengusaha_form_tambah.php"><button type="button" class="btn btn-primary">Tambah</button></a>
                <a href="pengusaha_hapus.php"><button type="button" class="btn btn-primary">Hapus</button></a>
                <a href="pengusaha_edit.php"><button type="button" class="btn btn-primary">Edit</button></a>
              </td>
              <td align="center">
                <div class="row">
                  <div class="col-lg-8">
                    <div class="input-group">
                      <input type="text" class="form-control" placeholder="Pencarian...">
                      <span class="input-group-btn">
                        <button class="btn btn-primary" type="button">Cari</button>
                      </span>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          </table>
          <?php
            $link=koneksi_db();
            $sql="select * from pemilik_usaha order by nama";
            $res=mysql_query($sql,$link);
            $banyakrecord=mysql_num_rows($res);
            if($banyakrecord>0){
              ?>
              <table class="table table-striped" align="center">
                <tr>
                  <td colspan=11 align="center" valign="middle"><font></font><h3>Data Pengusaha</h3></td>
                </tr>
                <tr>
                  <td>Nama</td>
                  <td>Nomor KTP</td>
                  <td>Alamat</td>
                  <td>Tempat Lahir</td>
                  <td>Tanggal Lahir</td>
                  <td>File KTP</td>
                  <td>No Telp</td>
                  <td>Email</td>
                  <td>Kata Sandi</td>
                  <td>Dihapus</td>
                  <td>Aktivasi</td>
                </tr>
                <?php
                  $i=0;
                  while($data=mysql_fetch_array($res)){
                    $i++;
                    ?>
                    <tr>
                      <td>
                        <?php echo $data['nama'];?>
                      </td>
                      <td>
                        <?php echo $data['no_ktp'];?>
                      </td>
                      <td>
                        <?php echo $data['alamat'];?>
                      </td>
                      <td>
                        <?php echo $data['tpt_lahir'];?>
                      </td>
                      <td>
                        <?php echo $data['tgl_lahir'];?>
                      </td>
                      <td>
                        <img src="../admin/gambar/<?php echo $data['foto_ktp'];?>" width="70px" height="70px">
                      </td>
                      <td>
                        <?php echo $data['no_telp'];?>
                      </td>
                      <td>
                        <?php echo $data['email'];?>
                      </td>
                      <td>
                        <?php echo $data['password'];?>
                      </td>
                      <td align="center">
                        <?php echo $data['dihapus'];?>
                      </td>
                      <td align="center">
                        <?php echo $data['aktivasi'];?>
                      </td>
                    </tr>
                    <?php
                  }?>
            </table>
            <?php
        }else{
          ?>
          <div class="alert alert-warning" role="alert">Data Pemilik Usaha tidak ditemukan !!</div>
          <?php
        }?>
              </table>
        </td> 
      </tr>
      <tr>
        <td colspan=2>
          <?php footer_web();?>
        </td>
      </tr>
    </table>

<!-- AKHIR CONTENT - dari sini kebawah jgn dihapus -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>