<?php
// DB table to use
$table = 'tb_pengunjung';
 
// Table's primary key
$primaryKey = 'id_pengunjung';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array( 'db' => 'nomor_identitas', 'dt' => 0 ),
    array( 'db' => 'nomor_kendaraan', 'dt' => 1 ),
    array( 'db' => 'nama_pengunjung',  'dt' => 2 ),
    array( 
        'db' => 'jenis_kelamin',   
        'dt' => 3,
        'formatter' => function ($data, $row){
            return $data  == "L" ? "Laki-laki" : "Perempuan";
        }
    ),
    array( 'db' => 'alamat',     'dt' => 4 ),
    array( 'db' => 'no_telp',     'dt' => 5 ),
    array( 'db' => 'id_pengunjung',     'dt' => 6 ),
   
    // array(
    //     'db'        => 'salary',
    //     'dt'        => 5,
    //     'formatter' => function( $d, $row ) {
    //         return '$'.number_format($d);
    //     }
    // )
);
 
// SQL server connection information
include_once "../_config/conn.php";
 
 
require( '../_assets/libs/DataTables/ssp.class.php' );
 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);
