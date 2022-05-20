<html>

<head>
    <title>Halaman Daftar</title>
    <!-- <link rel="stylesheet" type="text/css" href="style/style.css" /> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<style>
    .daftar:hover{
        transform : scale(1.005);
    }
</style>
<body style="background-color:#9bc535">


    <div class="card mx-auto w-50 mt-5 text-center px-auto">
        <div class="fs-1 rounded bg-success text-white mb-3">Register Form</div>

        <?php
        require "konek_db.php";
        ?>


        <form action="regist.php" method="POST">
            <table class="mx-auto w-75" border="0">
                <tr>
                    <td><b>
                            <h5>Nama Lengkap</h5>
                        </b></td>
                    <td><input class="form-control daftar" type="text" name="nama" /></td>
                </tr>
                <tr>
                    <td><b>
                            <h5>Jenis Kelamin</h5>
                        </b></td>
                    <td><input class="form-control daftar" type="text" name="jenis_kelamin" /></td>
                </tr>
                <tr>
                    <td><b>
                            <h5>Alamat</h5>
                            </h5>
                        </b></td>
                    <td><input class="form-control daftar" type="text" name="alamat" /></td>
                </tr>
                <tr>
                    <td><b>
                            <h5>Kota</h5>
                        </b></td>
                    <td><input class="form-control daftar" type="text" name="kota" /></td>
                </tr>
                <tr>
                    <td><b>
                            <h5>provinsi</h5>
                        </b></td>
                    <td><input class="form-control daftar" type="text" name="provinsi" /></td>
                </tr>
                <tr>
                    <td><b>
                            <h5>Kode Pos</h5>
                        </b></td>
                    <td><input class="form-control daftar" type="text" name="kode_pos" /></td>
                </tr>
                <tr>
                    <td><b>
                            <h5>Nomor Telepon</h5>
                        </b></td>
                    <td><input class="form-control daftar" type="text" name="nomor_telepon" /></td>
                </tr>
                <tr>
                    <td><b>
                            <h5>email</h5>
                        </b></td>
                    <td><input class="form-control daftar" type="email" name="email" /></td>
                </tr>
                <tr>
                    <td><b>
                            <h5>Password</h5>
                        </b></td>
                    <td><input class="form-control daftar" type="password" name="password" /></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="submit" class="daftar form-control bg-success text-white mt-3" value="Submit" /></td>
                </tr>

            </table>

        </form>
        <div class="mx-auto container-fluid text-center">
            Sudah Punya Akun ?
            <a href="login.php"> Masuk disini</a>
        </div>
    </div>
</body>

</html>