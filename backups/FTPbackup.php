<?php

set_time_limit(0);
ini_set('upload_max_filesize', 0);

$host = 'host';
$user = 'user';
$pass = 'pass';

$ruta_absoluta = '/var/www/';
$nombre_backup = 'backup.zip';

echo "Iniciando backup\n";
echo "----------------\n";

if(file_exists($ruta_absoluta.$nombre_backup))
	@unlink($ruta_absoluta.$nombre_backup) or exit("Fallo al borrar el antiguo $nombre_backup local\n");

echo "Comprimiendo ficheros...\n";
exec('zip -r9 '.$ruta_absoluta.$nombre_backup.' '.$ruta_absoluta.'html');

echo "Conectando con el servidor...\n";
$conexion = @ftp_connect($host, 21, 10) or exit("Fallo al conectar con $host\n");
@ftp_login($conexion, $user, $pass) or exit("Fallo al loguearse con $user:$pass\n");
@ftp_pasv($conexion, true) or exit("Fallo al entrar en el modo pasivo\n");

@ftp_chdir($conexion, 'backups_drinamics.com') or exit("Fallo al cambiar al directorio de los backups\n");
$ls = @ftp_nlist($conexion, '.') or exit("Fallo al listar el directorio de los backups\n");

if(in_array($nombre_backup, $ls))
	@ftp_delete($conexion, $nombre_backup) or exit("Fallo al borrar el antiguo $nombre_backup remoto\n");

unset($ls);

$inicio = time();

@ftp_put($conexion, $nombre_backup, $ruta_absoluta.$nombre_backup, FTP_BINARY) or exit("Fallo al subir el archivo\n");

echo 'Transferencia completada en ';
echo time()-$inicio;
echo " segundos\n";

?>
