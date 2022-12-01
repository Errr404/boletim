<?php

    
    namespace App\Db;

    use PDO;
    use \PDOException;


    class Database {

    /**
     * nome do host
     * @var string
     */
    const hostname = "localhost"; 
    /**
    * nome do bd
    * @var string
    */
    const DB = "aluno";
     /**
     * nome do user
     * @var string
     */
    const user = "root";
     /**
     * senha
     * @var string
     */
    const pass = "";

   /**
   * Nome da tabela a ser manipulada
   * @var string
   */
    private $table;
    /**
     * instancia da variável de conexão
     * @var PDO
     */
    private $connection;

    /**
     * define a tabela e instancia a conexão
     * @param string $table;
     */
    public function __construct($table = null){
        $this->table = $table;
        $this->setConnection();
      }

   /**
    * realiza a conexão com o banco de daddos
    */

   private function setConnection(){
        try{
            $this->connection = new PDO("mysql:dbname=".self::DB."; host=".self::hostname,self::user,self::pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e){
            echo "ERRO:".$e->getMessage();
        }
    }
    /**
     * metodo responsável pela execução das queries
     *  @param string $query
     *  @param array  $params
     *  @return PDOstatement
     */
    public function execute($query, $params = []){
        try{
            $startment = $this->connection->prepare($query);
            $startment->execute($params);
            return $startment;
        } 
        catch(PDOException $e){
            echo "ERRO:".$e->getMessage();
        }
    }
    /**
     * metodo responsável pela validação dos dados
     *  @return PDOstatement
     */
    public function validate($values){

    }
    /**
     * metodo responsável por fazer os inserts no database
     * @param array $values [field => values]
     * @return integer ID inserido
     */

    public function insert($values){
     //DADOS DA QUERY
     $fields = array_keys($values);
     $binds  = array_pad([],count($fields),'?');

 
     //MONTA A QUERY
     $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';

     
 
     //EXECUTA O INSERT
     $this->execute($query,array_values($values));   
    return $this->connection->lastInsertId();
     
    }
     /**
         * metodo que pega os dados do DB
         * @param string $where
         * @param string $order
         * @param string $limit
         * @param string $fields
         * @param string $asc
         * @return PDOstatement
         */
    public function select($where = null, $order = null, $limit = null, $asc = null, $fields = '*'){
        //dados da query
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? ' ORDER BY '.$order : '';
        $asc = strlen($asc) ? ' ASC '.$asc : '';
        $limit = strlen($limit) ? ' LIMIT '.$limit : '';

        //monta a query
        $query ='SELECT '.$fields.''.$where.' '.$limit.'FROM '.$this->table.' ORDER BY alu_ano ASC';

        //execute a query
        return $this->execute($query);
    }

    public function selectAverage( $where = null, $fields = '*'){
        //dados
        $where = strlen($where) ? 'WHERE '.$where : '';

        
        // montagem da query
        $query = 'SELECT'.$fields.'FROM '.$this->table.' '.$where;

        //execução
        return $this->execute($query);
    }
    /**
     * metodo responsável pela validação dos campos
     * @param string $where
     * @param string $alu
     * @return boolean
     */
    public function validator($fields, $where){
        //dados da query
        $where = strlen($where)? 'WHERE'.$where: '';
        //query de validação
        $validator_query = 'SELECT '.$fields.' FROM '.$this->table. ''.$where;
        echo $validator_query;
        
        return $this->execute($validator_query);
 
        
    }
}





 
