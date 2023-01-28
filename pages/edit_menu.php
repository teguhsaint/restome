<br>

<?php

$hasil = view_data_where('tb_menu', 'id_menu', $_GET['id_menu']);
$no = 1;
while ($read = mysqli_fetch_assoc($hasil)) {

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
                    <option value="<?= $reads['keterangan'] ?>"><?= $reads['keterangan'] ?></option>
                <?php
                }
                ?>
            </select>
            <small id="helpId" class="text-muted"></small>
        </div>

        <div class="mb-3">
            <label for="harga_menu" class="form-label">Harga Menu</label>
            <input type="text" value="<?= $read['harga'] ?>" name="harga_menu" id="harga_menu" class="form-control" placeholder="" aria-describedby="helpId">
            <small id="helpId" class="text-muted"></small>
        </div>

    </form>

    <?= $read['nama_menu']; ?>
    <?= $read['m_kategori']; ?>

<?php
} ?>