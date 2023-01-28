<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">NO</th>
                <th scope="col">NAMA MENU</th>
                <th scope="col">KATEGORI</th>
                <th scope="col">HARGA</th>
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
                    <td><?= $read['harga']; ?></td>
                </tr>
              

            <?php
            } ?>

        </tbody>
    </table>
</div>