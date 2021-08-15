<?php  
require('ILogger.php');

class Logger implements ILogger
{
    const LOG_DIRECTORY =  __DIR__ . '/Logs';

    const TIME_ZONE = 'Europe/Lisbon';

    const DEBGUG = '[DEBUG]';
    const SUCCESS = '[SUCCESS]';
    const WARNING = '[WARNING]';
    const ERROR = '[ERROR]';
    const SEVERE = '[SEVERE]';

    /**
     *  Creates Logs folder if this doesn't exists
     */
    public function createLogDirectory()
    {
        $logDirectory = self::LOG_DIRECTORY;

        if ( !is_dir( $logDirectory) ) {
            mkdir( $logDirectory );
            return ('<p>' . $logDirectory . ' folder created with sucess.</p>');
        }
        return ('</p>' . $logDirectory . ' folder already exist.</p>');
    }

    /**
     *  GET log file name [YYYYMMDD] (Ex: 20210815.log)
     */
    public function getFileName()
    {
        $nome_ficheiro = new DateTime();
        $nome_ficheiro->setTimezone( new DateTimeZone('Europe/Lisbon') );
        return $nome_ficheiro->format('dmY');
    }

    /**
     *  Creates Logs file if this doesn't exists
     */
    public function createLogFile( $nome_ficheiro )
    {
        $logDirectory = self::LOG_DIRECTORY;
        $ficheiro =  '/' . $nome_ficheiro . '.log';
        $caminhoTotal = $logDirectory . $ficheiro;        
        
        if ( !is_file( $caminhoTotal ) ) {
            file_put_contents( $caminhoTotal, null);
            return ('<p>Log file created with success in: ' . $caminhoTotal . '</p>');
        }
        return ('<p>Log file already exist in ' . $caminhoTotal . '</p>');
    }

    /**
     *  GET current log file [The current day Log fie and the one which will be written]
     */
    public function getLogFile( $nome_ficheiro )
    {
        $logDirectory = self::LOG_DIRECTORY;
        $ficheiro =  '/' . $nome_ficheiro . '.log';
        $caminhoTotal = $logDirectory . $ficheiro;
        return $caminhoTotal;
    }

    /**
     *  GET current date [Mask: YYYY-MM-DD HH:MM:SS.UUUUUU]
     */
    public function getCurrentDate()
    {       
        $temporizador = microtime(true);
        $milisegundos = sprintf("%06d",($temporizador - floor($temporizador)) * 1000000);
        $data = new DateTime( date('Y-m-d H:i:s.'.$milisegundos, $temporizador));
        $data->setTimezone( new DateTimeZone(self::TIME_ZONE) );
        return $data->format('Y-m-d H:i:s.u');
    }   

    /**
     *  Writes DEBUG level message
     * @param msg: Message to be written in the log file
     */
    public function debug( $msg )
    {
        $tipo = self::DEBGUG;
        $nome_ficheiro = $this->getFileName();
        $caminho = $this->getLogFile($nome_ficheiro);  
        $data = $this->getCurrentDate();     
        $log_msg = '[' . $data . '] - ' . $tipo . ' Message : ' .$msg . PHP_EOL ;

        $log_file = fopen( $caminho, 'a');
        fwrite(  $log_file  , $log_msg );
        fclose( $log_file );
    }

    /**
     *  Writes SUCCESS level message
     * @param msg: Message to be written in the log file     
     */
    public function success( $msg )
    {
        $tipo = self::SUCCESS;
        $nome_ficheiro = $this->getFileName();
        $caminho = $this->getLogFile($nome_ficheiro);     
        $data = $this->getCurrentDate();          
        $log_msg = '[' . $data . '] - ' . $tipo . ' Message : ' .$msg .  PHP_EOL;       

        $log_file = fopen( $caminho, 'a');
        fwrite(  $log_file  , $log_msg );
        fclose( $log_file );
    }

    /**
     *  Writes WARNING level message
     * @param msg: Message to be written in the log file
     */
    public function warning( $msg )
    {
        $tipo = self::WARNING;
        $nome_ficheiro = $this->getFileName();
        $caminho = $this->getLogFile($nome_ficheiro); 
        $data = $this->getCurrentDate();     
        $log_msg = '[' . $data . '] - ' . $tipo . ' Message : ' .$msg .  PHP_EOL;       

        $log_file = fopen( $caminho, 'a');
        fwrite(  $log_file  , $log_msg );
        fclose( $log_file );
    }

     /**
     * Writes WARNING level message + error stackTrace
     * @param msg: Message to be written in the log file
     * @param stackTrace: Error stackTrace
     */
    public function warningWithTrace( $msg, $stackTrace )
    {
        $tipo = self::WARNING;
        $nome_ficheiro = $this->getFileName();
        $caminho = $this->getLogFile($nome_ficheiro); 
        $data = $this->getCurrentDate();      
        $log_msg = '[' . $data . '] - ' . $tipo . ' Message : ' .$msg .  ' StackTrace: ' . $stackTrace . PHP_EOL;

        $log_file = fopen( $caminho, 'a');
        fwrite(  $log_file  , $log_msg );
        fclose( $log_file );
    }

    /**
     * Writes ERROR level message
     * @param msg: Message to be written in the log file
     */
    public function error( $msg )
    {
        $tipo = self::ERROR;
        $nome_ficheiro = $this->getFileName();
        $caminho = $this->getLogFile($nome_ficheiro); 
        $data = $this->getCurrentDate();          
        $log_msg = '[' . $data . '] - ' . $tipo . ' Message : ' .$msg .  PHP_EOL;     

        $log_file = fopen( $caminho, 'a');
        fwrite(  $log_file  , $log_msg );
        fclose( $log_file );
    }

    /**
     * Writes ERROR level message + error stackTrace
     * @param msg: Message to be written in the log file
     * @param trace: Error stackTrace
     */
    public function errorWithTrace( $msg, $stackTrace )
    {
        $tipo = self::ERROR;
        $nome_ficheiro = $this->getFileName();
        $caminho = $this->getLogFile($nome_ficheiro);    
        $data = $this->getCurrentDate();     
        $log_msg = '[' . $data . '] - ' . $tipo . ' Message : ' .$msg . ' StackTrace: ' . $stackTrace . PHP_EOL;

        $log_file = fopen( $caminho, 'a');
        fwrite(  $log_file  , $log_msg );
        fclose( $log_file );
    }

    /**
     * Writes SEVERE level message
     * @param msg: Message to be written in the log file
     */
    public function severe( $msg )
    {
        $tipo = self::SEVERE;
        $nome_ficheiro = $this->getFileName();
        $caminho = $this->getLogFile($nome_ficheiro);  
        $data = $this->getCurrentDate();     
        $log_msg = '[' . $data . '] - ' . $tipo . ' Message : ' .$msg . PHP_EOL ;

        $log_file = fopen( $caminho, 'a');
        fwrite(  $log_file  , $log_msg );
        fclose( $log_file );
    }

    /**
     * Writes SEVERE level message + error stackTrace
     * @param msg: Message to be written in the log file
     * @param trace: Error stackTrace
     */
    public function severeWithTrace($msg, $stackTrace)
    {
        $tipo = self::SEVERE;
        $nome_ficheiro = $this->getFileName();
        $caminho = $this->getLogFile($nome_ficheiro);    
        $data = $this->getCurrentDate();     
        $log_msg = '[' . $data . '] - ' . $tipo . ' Message : ' .$msg . ' StackTrace: ' . $stackTrace . PHP_EOL;

        $log_file = fopen( $caminho, 'a');
        fwrite(  $log_file  , $log_msg );
        fclose( $log_file );
    }
    
}

$logger = new Logger();

$_pasta = $logger->createLogDirectory();
$_nome_ficheiro = $logger->getFileName(); 
$_ficheiroCriado = $logger->createLogFile( $_nome_ficheiro );
$_ficheiro = $logger->getLogFile( $_nome_ficheiro );

?>