<?php

require_once './Dao.php';

class Pendencia extends Dao{
    
    function __construct() {
        parent::__construct();
    }

    public function buscarTodos(){
         $sql   = "SELECT protocolo.id, protocolo.numero,"
                . " intimador.nome as intimador,"
                . " modo.descricao as modo,"
                . " ocorrencias.descricao as ocorrencias,"
                . " protocolo.data_visita,"
                . " protocolo.obs"
                . " FROM protocolo "
                . " INNER JOIN intimador ON protocolo.idintimador=intimador.id "
                . " INNER JOIN modo ON protocolo.idmodo=modo.id "
                . " INNER JOIN status ON protocolo.idocorrencias=ocorrencias.id "
                ;
        
        $query = $this->con->query($sql);
        if(!$query){
            echo "Erro ao buscar os protocolos";
            print_r($query->errorInfo());
        }
        return $query->fetchAll();
    }
    public function buscarOcorrencias(){
        $sql = "SELECT * FROM ocorrencias";
        $query = $this->con->query($sql);
        return $query->fetchAll();
    }
  
 public function verificar($protocolo){
        $sql = "select count(*) as nrprotocolo from protocolo_pa where numero = :numero";
        $query = $this->con->prepare($sql);
        $query->execute(['numero' => $protocolo['numero']]);
        $res = $query->fetch();
        if($res['nrprotocolo']==0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
  
    public function verificaintima($protocolo){
       $sql = "select count(*) as nrprotocolo from protocolo_pa where idato = 1 and numero = :numero ";
        $query = $this->con->prepare($sql);
        $query->execute(['numero' => $protocolo['numero']]);
        $res = $query->fetch();
        if($res['nrprotocolo']==0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }  
 
    
    public function verificapendencia($protocolo){
        $sql = "select count(*) as nrprotocolo from protocolo_pa where idato = 11 and numero = :numero ";
        $query = $this->con->prepare($sql);
        $query->execute(['numero' => $protocolo['numero']]);
        $res = $query->fetch();
        if($res['nrprotocolo']==0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }  
  public function insere($protocolo){
          $sql = "update protocolo_pa set idato = 11, data_visita = CURDATE() where numero = :numero";
        $query = $this->con->prepare($sql);
        $r = $query->execute(['numero' => $protocolo['numero']]);
        
        if($r){
            $sql = "INSERT INTO protocolo(numero, idato,  data_visita) "
                . " VALUES(:numero, 11, CURDATE())";
            $query = $this->con->prepare($sql);
           
            $r = $query->execute($protocolo);
        
            return true;
        }else{
            echo "Erro ao inserir novo protocolo";
            print_r($protocolo);
            print_r($query->errorInfo());
        }
    }
   
   
}

