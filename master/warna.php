<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | DataTables</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<div class="row">
          <div class="col-12">


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Warna</h3>
              </div>
              <!-- /.card-header -->

              <table width="20px">
                <tr>
                <td> <a href="index.php?type=master_warnaadd" class="btn btn-block btn-primary btn-sm">Tambah</a></td>
              </tr>
            </table>

                <?php
                
                    $query_sql="SELECT * FROM warna";
                    $query=mysqli_query($konek,$query_sql);
                ?>
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Warna</th>
                    <th>Action </th>
                  </tr>
                  </thead>

                  <tbody>
                  <?php
                    $no=0;
                    while($warna = mysqli_fetch_array($query)){
                            $no++;
                    ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $warna['warna'] ?></td>
                        <td><a href="index.php?type=master_warna_edit&id=<?php echo $warna['id_warna'] ?>">Edit</a> | 
                          <a href="index.php?type=master_warna_delete&id=<?php echo $warna['id_warna'] ?>">Delete</a> </td>
                        
                    </tr>
                <?php
                }
                ?>
                </tbody>
                  
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>