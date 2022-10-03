# classlogger
classe para implementação de logs dinamicos

A classe permite a expanção em outras modalidades de logs mas atualmente esta definida para cração de arquivos texto em diretorio previamente definido.

exemplo de Uso:
$log = new Logger('DB',[$identifier,$PDO->errorInfo()],$sql);
$log = new Logger(string PREFIX,array mensagem de erro,informações adicionais);
