<?php

Header('Content-type: text/xml');
//koneksi ke database
$connection = mysqli_connect("localhost", "root", "", "uts_xml") or die("Error " . mysqli_error($connection));
$xml = new SimpleXMLElement('<xml/>');

$sql = "select * from buku ";
$result = mysqli_query($connection, $sql) or die("Error " . mysqli_error($connection));

//membuat array
while ($row = mysqli_fetch_assoc($result)) {

    $track = $xml->addChild('buku');
    $track->addChild('judul', $row['judul']);
    $track->addChild('penulis', $row['penulis']);
    $track->addChild('tahun_terbit', $row['tahun_terbit']);
}

print($xml->asXML());
//tutup koneksi ke database
mysqli_close($connection);
?>