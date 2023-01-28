<br>
<table class="table table-hover w-100" id="table">
    <thead>
        <tr>
            <th scope="col">NO</th>
            <th scope="col">NAMA MENU</th>
            <th scope="col">KATEGORI</th>
            <th scope="col">HARGA</th>
            <th scope="col">Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $hasil = view_data('tb_menu');
        $no = 1;
        while ($read = mysqli_fetch_assoc($hasil)) {

        ?>

            <tr class="">
                <td scope="row"><?= $no++; ?></td>
                <td><?= $read['nama_menu']; ?></td>
                <td><?= $read['m_kategori']; ?></td>
                <td>Rp. <?= str_replace(',','.',number_format($read['harga'],0)); ?></td>
                <td>
                    <a class="me-2 text-warning" href="index.php?p=edit_menu&id_menu=<?= $read['id_menu']; ?>"><i class="far fa-edit"></i></a>
                    <a class="text-danger" href="index.php?p=hapus&id_menu=<?= $read['id_menu']; ?>"><i class="far fa-trash"></i></a>

                </td>
            </tr>

        <?php
        } ?>

    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#table').DataTable({
            responsive: true
        });
    });
</script>