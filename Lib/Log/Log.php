<?php
namespace Lib\Log;

/**
 * Fornece uma interface abstrata para definição de algoritmos de LOG
 * @author Pablo Dall'Oglio
 */
abstract class Log
{
    protected $message;  // local do arquivo de LOG
    protected $sql;  //instrução sql que queira armazenar
    protected $prefix;  // prefixo identificador do LOG

    public function __construct($prefix,$message,$sql = null)
    {
		$this->prefix =  strtoupper( $prefix );
        $this->message = $message;
        $this->sql = $sql;
        $this->write();
    }

    // define o método write como obrigatório
    abstract function write();
}
