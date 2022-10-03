# classlogger
classe para implementação de logs dinamicos

A classe permite a expanção em outras modalidades de logs mas atualmente esta definida para cração de arquivos texto em diretorio previamente definido.

exemplo de Uso:
$log = new Logger('DB',[$identifier,$PDO->errorInfo()],$sql);
$log = new Logger(string PREFIX,array mensagem de erro,informações adicionais);

será visivel como:
  path/defined/into/class/constant/PREFIX_aaaa-mm-dd.log
  
  IMPORTANTE:
  definir o caminho correto para a classe escrever o arquivo e dar as permições necessárias
