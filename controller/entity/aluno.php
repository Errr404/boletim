<?php

namespace App\entity;

use App\Db\Database;
use \PDO;

    class Aluno {

        /**
         * matricula do aluno
         * @var integer
         */
        public $alu_id;

        /**
         * classe do aluno
         * @var string
         */
        public $alu_ano;
        /**
         * nome do aluno
         * @var string
         */
        public $alu_nome;
        /**
         * turno do aluno
         * @var string;
         */

        public $alu_turno;
        /**
         * foto do aluno
         * @var string;
         */
        public $alu_foto;

        /**
         * metodo responsável por cadastrar o aluno
         * @return boolean
         */
        public function cadastrar(){


            // inserir o aluno dentro do DB
            $obDatabase = new Database('tb_aluno');
            $this->id = $obDatabase->insert([
                'alu_nome' => $this->alu_nome,
                'alu_ano' => $this->alu_ano,
                'alu_turno' => $this->alu_turno,
                'alu_foto' => $this->alu_foto
            ]);

            // print_r($this);
            
            //retorna sucesso
            return true;
            // instanciar e atribuir um ID ao aluno
        }

          /**
         * metodo responsável pela validação dos campos
         * @return Aluno
         */
        public function getValidator(){
            return(new Database('tb_aluno'))->validator('alu_nome'.$this->alu_nome,[]); 
        }

        /**
         * metodo que pega os dados do DB
         * @param string $where
         * @param string $order
         * @param string $limit
         * @param string $fields
         * @return array
         */
        public static function getAluno($where = null, $order = null, $limit = null, $asc = null){
            return(new Database('tb_aluno'))->select($where,$order,$limit,$asc)
            ->fetchAll(PDO::FETCH_CLASS,self::class);


        }
        /**
         *@param string $where
         *@param string $limit
         */
        public function getMedia($where = null, $limit = null){

            return(new Database('tb_nota'))->select($where)
            ->fetchAll(PDO::FETCH_ASSOC, self::class);
        }
 
    }