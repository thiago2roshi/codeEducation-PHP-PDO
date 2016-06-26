<?php
/**
 * [clase de conexão com o bando de dados]
 * @author Thiago Souza Santos <ads.thiagosouza@gmail.com> @ThiagoRoshi
 * @greeters Gregory Monteiro pelo auxilio com a abstração da conexão com o DB <linhadecodigo.com.br>
 *
 * modelo simplificado para etapa 1 do projeto phpPDO
 */

class Conexao
{
    /**
     * construtor da conexão
     */
    // private function __construct($sgdb, $host, $port, $db, $user, $pass){}
    public function __construct(){}
    /**
     * Evitar que função sega clonada
     */
    private function __clone(){}

    /**
     * destruir conexão ao remover instancia do DB
     * 			e libera a memoria usada
     * @return null
     */
    public function __destruction()
    {
        $this->disconnect();
        foreach ($this as $key => $value) {
            unset($this->key);
        }
    }
    /**
     * Variaveis
     * @var [type]
     */
    private static $sgdb = "mysql";         // @var String Banco de dados
    private static $host = "172.17.0.2";    // @var String endereco do host
    private static $port = "3306";          // @var String porta de escuta do SGDB
    private static $user = "root";          // @var String userID do DB
    private static $pass = "Pindauva";      // @var String senha do DB
    private static $db   = "codeEducation"; // @var String DB usado

    /**
     * Definindo Getters
     * @return = variavel solicitada
     */
    private function getDBType() {return self::$sgdb;}
    private function getHost()   {return self::$host;}
    private function getPort()   {return self::$port;}
    private function getUser()   {return self::$user;}
    private function getPwd()    {return self::$pass;}
    private function getDB()     {return self::$db;}

    /**
     * Conexao com o banco de dados
     *
     * @return statement variavel com a conexao com o DB
     */
    private function connect()
    {
        try{
            $this->conexao = new PDO("{$this->getDBType()}:host={$this->getHost()};port={$this->getPort()};dbname={$this->getDB()};charset=utf8", $this->getUser(), $this->getPwd());

        }catch (\PDOException $e){
            die(
                'Erro Codigo: <code>' . $e->getCode()          . "</code></br>" .
                'Descricao  : <code>' . $e->getMessage()       . "</code></br>" .
                'Trace      : <code>' . $e->getTraceAsString() . "</code></br>"
               );

        }

        return ($this->conexao);
    }

    /**
     * desconectando banco de dados
     * @return null apaga conexao com DB
     */
    private function disconnect()
    {
        $this->conexao = null;
    }

    // ============== //
    // Iniciando CRUD //
    // ============== //

/**
 * função para os SELECTs do DB
 * @param  String $sql   => query enviada para o Select
 * @param  String $param => Parametro adicional   - se não declada = NULL
 * @param  String $class => Classe para ser usada - se não declada = NULL
 * @return VO-Array      => Resultado da query em VO ou Array
 */
    public function selectDB($sql, $params = null, $class = null)
    {
        $conexao = $this->connect();
        $query   = $conexao->prepare($sql);
        $query->execute($params);

        if ($query->rowCount() < 1) {
            return false;
        } else {
            #$result = $query->fetchAll(PDO::FETCH_CLASS) or die(print_r($query->errorInfo(), true));
            $result = $query->fetchAll() or die(print_r($query->errorInfo(), true));
        }
        self::__destruction();
        return $result;
    }


    /**
     * funcao para inserir dados no DB
     * @param  String $sql   => query enviada para o insert
     * @param  String $param => Parametro adicional - se não declada = NULL
     * @return String        => Resultado da Query  - exibe o ultimo ID inserido
     */
    public function insertDB($sql, $params = null)
    {
        $conexao = $this->connect();
        $query   = $conexao->prepare($sql);
        $query->execute($params);

        $result = $conexao->lastInserId() or die(print_r($query->errorInfo(), true));

        self::__destruction();
        return $result;
    }

    /**
     * funcao para atualizar os dados do DB
     * @param  String $sql   => query enviada para o UPDATE
     * @param  String $param => Parametro adicional - se não declada = NULL
     * @return String        => Resultado da Query  - exibe linhas afetadas
     */
    public function updateDB($query, $params= null)
    {
        $conexao = $this->connect();
        $query = $conexao->prepare($sql);
        $query = $query->execute($params);

        $result = $conexao->rowCount() or die(print_r($query->errorInfo(), true));

        self::__destruction();
        return $result;
    }

    /**
     * funcao para remover os dados do DB
     * @param  String $sql   => query enviada para o UPDATE
     * @param  String $param => Parametro adicional - se não declada = NULL
     * @return String        => Resultado da Query  - exibe linhas afetadas
     */
    public function deleteDB($sql, $params = null)
    {
        $conexao = $this->connect();
        $query = $conexao->prepare($sql);
        $query = $query->execute();

        $result = $conexao->rowCount() or die(print_r($query->errorInfo(), true));

        self::__destruction();
        return $result;

    }
}
