<br>

<?php

$hasil = view_data_where('tb_menu', 'id_menu', $_GET['id_menu']);
$no = 1;
$nama_menu = '';
while ($read = mysqli_fetch_assoc($hasil)) {
    $nama_menu = $read['nama_menu'];
?>

    <form action="" method="post">
        <div class="mb-3">
            <label for="nama_menu" class="form-label">Nama Menu</label>
            <input type="text" value="<?= $read['nama_menu'] ?>" name="nama_menu" id="nama_menu" class="form-control" placeholder="" aria-describedby="helpId">
            <small id="helpId" class="text-muted"></small>
        </div>

        <div class="mb-3">
            <label for="harga_menu" class="form-label">Kategori Menu</label>
            <select class="form-select" name="m_kategori" id="">
                <option>Pilih Kategori</option>
                <?php
                $hasils = view_data('tb_kategori');
                $no = 1;
                while ($reads = mysqli_fetch_assoc($hasils)) { ?>
                    <option <?php if ($read['m_kategori'] == $reads['keterangan']) echo 'selected'; ?> value="<?= $reads['keterangan'] ?>"><?= $reads['keterangan'] ?></option>
                <?php
                }
                ?>
            </select>
            <small id="helpId" class="text-muted"></small>
        </div>

        <div class="mb-3">
            <label for="harga_menu" class="form-label">Harga Menu</label>
            <input type="text" value="<?= $read['harga'] ?>" name="harga" id="harga_menu" class="form-control" placeholder="" aria-describedby="helpId">
            <small id="helpId" class="text-muted"></small>
        </div>

        <button type="submit" name="simpans" class="btn btn-success">Update Menu</button>
    </form>


<?php
} ?>

<?php

if (isset($_POST['simpans'])) {
    $data = [];
    foreach ($_POST as $key => $value) {
        if ($key != 'simpans') {
            array_push($data, "$key='$value'");
        }
    }
    update_data($data, 'id_menu', $_GET['id_menu'], 'tb_menu', true);
}

?>