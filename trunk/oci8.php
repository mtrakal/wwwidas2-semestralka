<?php
require_once './dibi/dibi.php';

try {
    dibi::connect(array(
        'driver'   => 'oracle',
        'database' => 'sql101.upceucebny.cz:1521/oracle10',
        'username' => 'st22312',
        'password' => '*******'
    ));
} catch (DibiException $e) {
    echo get_class($e), ': ', $e->getMessage(), "\n";
}
//$connection = dibi::getConnection('druhe pripojeni');


if(dibi::isConnected()) {
    $result= dibi::query("select zam.prijmeni, odd.nazev from am_zamestnanci.zam join am_zamestnanci.odd on zam.oddcis = odd.oddcis");

    $single = $result->fetchSingle();
    echo $single;
}
/*
$conn = oci_connect("st22312", "*******", "sql101.upceucebny.cz:1521/oracle10");
$stmt = oci_parse($conn, "select zam.prijmeni, odd.nazev from am_zamestnanci.zam join am_zamestnanci.odd on zam.oddcis = odd.oddcis");
oci_execute($stmt, OCI_DEFAULT);

echo $stmt;*/
?>