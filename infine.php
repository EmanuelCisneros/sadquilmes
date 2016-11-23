<?php


// Establece la conexión con la base de datos
$conexion = mysql_connect("localhost","root", "");
mysql_select_db("sadquilmes", $conexion) or
// En caso de que fallé la conexión muestra el siguiente mensaje de error:
die ('Problemas en la selección de la base de datos');


$area = substr($_POST['area'], 0, 20); // Mantiene los caracteres fijos en backend.
$area - filter_var($area, FILTER_SANITIZE_SPECIAL_CHARS); // Codificar caracteres HTML.

$lista = substr($_POST['lista'], 0, 20); // Mantiene los caracteres fijos en backend.
$lista - filter_var($lista, FILTER_SANITIZE_SPECIAL_CHARS); // Codificar caracteres HTML.

$nombre = substr($_POST['nombre'], 0, 70); // Mantiene los caracteres fijos en backend.
$nombre - filter_var($nombre, FILTER_SANITIZE_SPECIAL_CHARS); // Codificar caracteres HTML.

$tipo = substr($_POST['tipo'], 0, 10); // Mantiene los caracteres fijos en backend.
$tipo - filter_var($tipo, FILTER_SANITIZE_SPECIAL_CHARS); // Codificar caracteres HTML.

$documento = substr($_POST['documento'], 0, 20); // Mantiene los caracteres fijos en backend.
$documento - filter_var($documento, FILTER_SANITIZE_SPECIAL_CHARS); // Codificar caracteres HTML.

$nacimiento = substr($_POST['nacimiento'], 0, 20); // Mantiene los caracteres fijos en backend.
$nacimiento - filter_var($nacimiento, FILTER_SANITIZE_SPECIAL_CHARS); // Codificar caracteres HTML.

$cuil = substr($_POST['cuil'], 0, 15); // Mantiene los caracteres fijos en backend.
$cuil - filter_var($cuil, FILTER_SANITIZE_SPECIAL_CHARS); // Codificar caracteres HTML.

$telefono = substr($_POST['telefono'], 0, 15); // Mantiene los caracteres fijos en backend.
$telefono - filter_var($telefono, FILTER_SANITIZE_SPECIAL_CHARS); // Codificar caracteres HTML.

$email = substr($_POST['email'], 0, 40); // Mantiene los caracteres fijos en backend.
$email - filter_var($email, FILTER_SANITIZE_SPECIAL_CHARS); // Codificar caracteres HTML.

$domicilio = substr($_POST['domicilio'], 0, 50); // Mantiene los caracteres fijos en backend.
$domicilio - filter_var($domicilio, FILTER_SANITIZE_SPECIAL_CHARS); // Codificar caracteres HTML.

$localidad = substr($_POST['localidad'], 0, 50); // Mantiene los caracteres fijos en backend.
$localidad - filter_var($localidad, FILTER_SANITIZE_SPECIAL_CHARS); // Codificar caracteres HTML.

$nacionalidad = substr($_POST['nacionalidad'], 0, 50); // Mantiene los caracteres fijos en backend.
$nacionalidad - filter_var($nacionalidad, FILTER_SANITIZE_SPECIAL_CHARS); // Codificar caracteres HTML.

$cuil = substr($_POST['cuil'], 0, 20); // Mantiene los caracteres fijos en backend.
$cuil - filter_var($cuil, FILTER_SANITIZE_SPECIAL_CHARS); // Codificar caracteres HTML.

$registro = substr($_POST['registro'], 0, 20); // Mantiene los caracteres fijos en backend.
$registro - filter_var($registro, FILTER_SANITIZE_SPECIAL_CHARS); // Codificar caracteres HTML.

$jubilacion = substr($_POST['jubilacion'], 0, 5); // Mantiene los caracteres fijos en backend.
$jubilacion - filter_var($jubilacion, FILTER_SANITIZE_SPECIAL_CHARS); // Codificar caracteres HTML.

$pasivas = substr($_POST['pasivas'], 0, 5); // Mantiene los caracteres fijos en backend.
$pasivas - filter_var($pasivas, FILTER_SANITIZE_SPECIAL_CHARS); // Codificar caracteres HTML.

$titular = substr($_POST['titular'], 0, 5); // Mantiene los caracteres fijos en backend.
$titular - filter_var($titular, FILTER_SANITIZE_SPECIAL_CHARS); // Codificar caracteres HTML.

$secundario = substr($_POST['secundario'], 0, 300); // Mantiene los caracteres fijos en backend.
$secundario - filter_var($secundario, FILTER_SANITIZE_SPECIAL_CHARS); // Codificar caracteres HTML.

$terciario = substr($_POST['terciario'], 0, 300); // Mantiene los caracteres fijos en backend.
$terciario - filter_var($terciario, FILTER_SANITIZE_SPECIAL_CHARS); // Codificar caracteres HTML.

$tramite = substr($_POST['tramite'], 0, 300); // Mantiene los caracteres fijos en backend.
$tramite - filter_var($tramite, FILTER_SANITIZE_SPECIAL_CHARS); // Codificar caracteres HTML.

$fechaorden = substr($_POST['fechaorden'], 0, 12); // Mantiene los caracteres fijos en backend.
$fechaorden - filter_var($fechaorden, FILTER_SANITIZE_SPECIAL_CHARS); // Codificar caracteres HTML.


// Revisa el campo de la Fecha, en base a eso detecta si un registro fue cargado en la misma fila.
$resultado = mysql_query("SELECT * FROM turnos where Fecha='$fechaorden'", $conexion);
$numero_filas = mysql_num_rows($resultado);


// Coloca el número de columnas en la tabla y agrega en caso de ser menos o igual a 50.
if($numero_filas<=50)
{

// Inserta los datos en la tabla de turnos, con los valores ingresados.

mysql_query ("INSERT INTO turnos(ID, Nombre, DNI, Fecha) VALUES ('','$nombre','$documento','$fechaorden')", $conexion);


// Se usa la Librería FPDF para crear el pdf con los datos ingresados.

require('fpdf/fpdf.php');
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();

$pdf->Image('logo.jpg' , 150 , 5, 40 , 40);
$pdf->Ln();
$pdf->Ln();


$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(40, 10, utf8_decode("ÁREA:"));
$pdf->Cell(40, 10, $area);
$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(40, 10, ("LISTADO:"));
$pdf->Cell(40, 10, $lista);
$pdf->Ln();


$pdf->SetFont('Arial', 'U', '14');
$pdf->Cell(40, 10, ("DATOS PERSONALES:"));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(40, 10, ("Nombres y Apellidos:"));
$pdf->Ln();
$pdf->Cell(40, 10, utf8_decode($nombre));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(40, 10, ("Documento:"));
$pdf->Cell(40, 10, utf8_decode($tipo));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(40, 10, utf8_decode("Número:"));
$pdf->Cell(40, 10, utf8_decode($documento));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(40, 10, ("Nacimiento:" ));
$pdf->Cell(40, 10, $nacimiento);
$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(40, 10,  utf8_decode("Teléfono:" ));
$pdf->Cell(40, 10, utf8_decode($telefono));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(40, 10, ("E-mail:" ));
$pdf->Cell(40, 10, $email);
$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(40, 10, ("Domicilio:" ));
$pdf->Cell(40, 10, utf8_decode($domicilio));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(40, 10, ("Localidad:" ));
$pdf->Cell(40, 10, utf8_decode($localidad));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(40, 10, ("Nacionalidad:"));
$pdf->Cell(40, 10, utf8_decode($nacionalidad));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(40, 10, utf8_decode("N° CUIL:" ));
$pdf->Cell(40, 10, utf8_decode($cuil));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(40, 10,  utf8_decode("N° Registro:" ));
$pdf->Cell(40, 10, utf8_decode($registro));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(40, 10, ("Jubilado:" ));
$pdf->Cell(40, 10, $jubilacion);
$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(40, 10, ("Titular:" ));
$pdf->Cell(40, 10, $titular);
$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(40, 10, ("Tareas Pasivas:" ));
$pdf->Cell(40, 10, $pasivas);
$pdf->Ln();
$pdf->Ln();


$pdf->SetFont('Arial', 'U', '14');
$pdf->Cell(40, 10, ("ESTUDIOS:" ));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(40, 10, ("Secundarios:" ));
$pdf->Cell(40, 10, utf8_decode($secundario));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(40, 10, ("Terciarios:" ));
$pdf->Cell(40, 10, utf8_decode($terciario));
$pdf->Ln();

$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(40, 10,  utf8_decode("En trámite:" ));
$pdf->Cell(40, 10, utf8_decode($tramite));
$pdf->Ln();

$pdf->SetFont('Arial', 'U', '14');
$pdf->Cell(40, 10, ("TURNO:" ));
$pdf->Ln();

$pdf->SetFont('Times', 'B', '12');
$pdf->Cell(40, 10,  utf8_decode("Fecha de Turno:" ));
$pdf->Cell(40, 10, utf8_decode($fechaorden));
$pdf->Ln();

$pdf->SetFont('Times', 'B', '12');
$pdf->Cell(40, 10,  utf8_decode("N° de Turno:" ));
$pdf->Cell(40, 10, utf8_decode($numero_filas+1));
$pdf->Ln();

}


else{

echo '<script language="javascript">alert("Todos los turnos en la fecha seleccionada han sido otorgados. Por favor, seleccioné otra fecha de entrega.");</script>'; 
}

$pdf->Output();