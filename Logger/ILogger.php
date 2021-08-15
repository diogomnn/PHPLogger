<?php 

interface ILogger
{
  public function createLogDirectory();
  public function getFileName();
  public function createLogFile( $nome_ficheiro );
  public function getLogFile( $nome_ficheiro );
  public function getCurrentDate();
  public function debug( $msg );
  public function success( $msg );
  public function warning( $msg );
  public function warningWithTrace( $msg, $trace );
  public function error(  $msg );
  public function errorWithTrace( $msg, $trace );
  public function severe( $msg );
  public function severeWithTrace( $msg, $trace );
}

?>