<?php 
//Funções
include('function.php');

$whereFiltros = '';

// DB table to use
$table = 'tb_Paciente';
 
// Table's primary key
$primaryKey = 'idPaciente';

// indexes
$columns = array(
    array( 'db' => 'idPaciente', 'dt' => 0 ),
    array( 'db' => 'Nome', 'dt' => 1, 'formatter' => function( $d, $row ) {
            return $d;
        }),
    array( 'db' => 'DataNascimento', 'dt' => 2, 'formatter' => function( $d, $row ) {
            return date('d/m/Y', $d);
        }),
    array( 'db' => 'Telefone', 'dt' => 3, 'formatter' => function( $d, $row ) {
            return $d;
        }),
    array( 'db' => 'idPaciente', 'dt' => 4, 'formatter' => function( $d, $row ) {
        return 
        '<div class="row">'
            .'<div class="col-md-12" align="center">'
                .'<a href="editar-paciente.php?id='.MD5($d).'" id="edit" class="edit">'
                    .'<h6><i class="fa-solid fa-pen" data-toggle="tooltip" title="Alterar informações do paciente"></i></h6>'
                .'</a>'
            .'</div>'
        .'</div>';
    })
);
 
// SQL server connection information
include('conexaoAJAX.php'); 
 
require( 'ssp.class.php' );
 
echo json_encode(
    //SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
    SSP::complex( $_GET, $sql_details, $table, $primaryKey, $columns, null, $whereFiltros )
);