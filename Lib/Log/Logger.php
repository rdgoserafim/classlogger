<?php
/*
10.08.2022 15:33:09 -03
By: Rodrigo Serafim, <rdgo.serafim@gmail.com>
h3rmes Tecnologia
*/

namespace Lib\Log;

use \Lib\Session\Session;
use \Lib\Core\RouterManager;
use \Lib\Core\Def;


class Logger extends \Lib\Log\Log
{
    /**
     * Escreve uma mensagem no arquivo de LOG
     * @param $message = mensagem a ser escrita
     */

    public function write()
    {
		$debug = debug_backtrace();
		$trace = 'Backtrace: ';
		if(is_array($debug)){
			foreach($debug as $d){
				$file = substr($d['file'],strrpos($d['file'], DIRECTORY_SEPARATOR)) ;
				$trace .= $file .'['. $d['line'] . '] ';
			}
		}

		if(is_array($this->message)){
			$this->message = json_encode($this->message,JSON_PRETTY_PRINT);
		}

		$filelog = _PATH_LOG . $this->prefix.'_'.date("Y-m-d").'.log';

		$log  = '# **'.$this->prefix.'** - '.date(DATE_ATOM, time()).''.PHP_EOL.
				$trace.PHP_EOL;

		if(!is_null($this->sql)){
		$log  .= '##STATEMENT: '.PHP_EOL.
				' '.$this->sql.PHP_EOL;
		}

		$log  .= '##ERROR:'.PHP_EOL.
				' '.$this->message.PHP_EOL.
				"-------------------------".PHP_EOL.' '.PHP_EOL;
		file_put_contents($filelog, $log, FILE_APPEND | LOCK_EX);
    }
}
