<?php
include "config.php";

$dataxml = simplexml_load_file('databuku.xml');

foreach($dataxml->buku as $buku)
{
    $id_buku = $buku['id_buku'];
    $judul = $buku->judul;
    $penulis = $buku->penulis;
    $tahun_terbit = $buku->tahun_terbit;
    $databuku =mysqli_query($koneksi, "INSERT INTO buku 
    VALUES ('$id_buku', '$judul', '$penulis', '$tahun_terbit') ");
}

?>