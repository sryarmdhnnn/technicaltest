<?php
$title = 'pengguna';
require 'functions.php';

$role = ['admin', 'owner', 'kasir'];

$id_user = $_GET['id'];
$queryedit = "SELECT * FROM user WHERE id_user = '$id_user'";
$edit = ambilsatubaris($conn, $queryedit);

if (isset($_POST['btn-simpan'])) {
    $nama     = $_POST['nama_user'];
    $email     = $_POST['email'];
    $username = $_POST['username'];
    $role     = $_POST['role'];
    if ($_POST['password'] != null || $_POST['password'] == '') {
        $pass     = md5($_POST['password']);
        $query = "UPDATE user SET nama_user = '$nama' , email = '$email' , username = '$username' , role = '$role' , password ='$pass' WHERE id_user = '$id_user'";
    } else {
        $query = "UPDATE user SET nama_user = '$nama' , email = '$email' , username = '$username' , role = '$role' WHERE id_user = '$id_user'";
    }


    $execute = bisa($conn, $query);
    if ($execute == 1) {
        $success = 'true';
        $title = 'Berhasil';
        $message = 'Berhasil mengubah ' . $role;
        $type = 'success';
        header('location: index.php?crud=' . $success . '&msg=' . $message . '&type=' . $type . '&title=' . $title);
    } else {
        echo "Gagal Tambah Data";
    }
}


require 'layout_header.php';
?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Edit Data Pengguna</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-md-6">
                        <a href="index.php" class="btn btn-secondary box-title"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <button id="btn-refresh" class="btn btn-dark box-title text-right" title="Refresh Data"><i class="fa fa-refresh" id="ic-refresh"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <form method="post" action="">
                    <div class="form-group">
                        <label>Nama Pengguna</label>
                        <input type="text" name="nama_user" class="form-control" value="<?= $edit['nama_user'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?= $edit['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" value="<?= $edit['username'] ?>">
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control">
                            <small class="text-danger">Kosongkan saja jika tidak akan mengubah password</small>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <select name="role" class="form-control">
                                <?php foreach ($role as $key) : ?>
                                    <?php if ($key == $edit['role']) : ?>
                                        <option value="<?= $key ?>" selected><?= $key ?></option>
                                    <?php endif ?>
                                    <option value="<?= $key ?>"><?= ucfirst($key) ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="text-right">
                            <button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> RESET</button>
                            <button type="submit" name="btn-simpan" class="btn btn-success"><i class="fa fa-save"></i> SIMPAN</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require 'layout_footer.php';
?>