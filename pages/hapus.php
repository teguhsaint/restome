<?php

$jenis = $_GET['jenis'];


if ($jenis == 'data_menu') {
    $id = $_GET['id_menu'];
    delete_data('id_menu', $id, 'tb_menu', true);
}
