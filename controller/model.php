<?php

function koneksi()
{
    $db_host = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_name = 'restome_db';
    $koneksi = mysqli_connect($db_host, $db_username, $db_password, $db_name);
    return $koneksi;
}

function add_menu($data, $table_name)
{
    $data_to_arrayread = implode(",", $data);
    $query = "INSERT INTO $table_name VALUES(NULL,$data_to_arrayread)";
    mysqli_query(koneksi(), $query);
}

function view_data($table_name)
{
    $query = "SELECT * FROM $table_name";
    $result = mysqli_query(koneksi(), $query);
    return $result;
}

function view_data_where($table_name, $where, $value_key)
{
    $query = "SELECT * FROM $table_name WHERE $where=$value_key";
    $result = mysqli_query(koneksi(), $query);
    return $result;
}


function view_count_sum($table_name, $counting_data, $group, $group_by)
{
    $query = '';
    if ($group == true) {
        $query = "SELECT count($counting_data) as cnt FROM $table_name GROUP BY $group_by";
    } else {
        $query = "SELECT count($counting_data) as cnt FROM $table_name";
    }


    $result = mysqli_query(koneksi(), $query);
    return $result;
}

function update_data($set_data, $key_finder, $value_key, $table_name, $primarykey)
{
    $imp_data = implode(",", $set_data);

    if ($primarykey == true) {
        $query = "UPDATE $table_name SET $imp_data WHERE $key_finder=$value_key";
    } else {
        $query = "UPDATE $table_name SET $imp_data WHERE $key_finder LIKE '$value_key'";
    }
    mysqli_query(koneksi(), $query);
}

function delete_data($key_finder, $value_key, $table_name, $primarykey)
{

    if ($primarykey == true) {
        $query = "DELETE FROM $table_name WHERE $key_finder=$value_key";
    } else {
        $query = "DELETE FROM $table_name WHERE $key_finder LIKE '$value_key'";
    }
    mysqli_query(koneksi(), $query);
}
