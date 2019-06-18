<?php
require_once './Ocorrencia.php';
$daoOcorrencia = new Ocorrencia();


if(!isset($_GET['acao'])){
    $acao = "index";
}else{
    $acao = $_GET['acao'];
}

//
if($acao == "index"){
    $listaProtocolo = $daoOcorrencia->buscarTodos();
    require './cabecalho.php';
    require './rodape.php';   
}else if($acao == "cadastrar"){
    $protocolo = $_POST;
    $verificar = $daoOcorrencia->verificar($protocolo);
    
    if($verificar)
    {
      $verificar2 = $daoOcorrencia->verificaintima($protocolo);
      if ($verificar2){
          header('Location: crudOcorrencia.php?acao=novo&erro=3&numero='. $protocolo['numero']);
      }else {
        $verificar3 = $daoOcorrencia->verificapendencia($protocolo);
        if ($verificar3){
          header('Location: crudOcorrencia.php?acao=novo&erro=7&numero='. $protocolo['numero']);
        }else{
            $r = $daoOcorrencia->insere($protocolo);
            if($r) header('Location: crudOcorrencia.php?acao=novo&erro=5&numero='. $protocolo['numero']);
        }
      }
    }
    else
    { 
        header('Location: crudOcorrencia.php?acao=novo&erro=1&numero='. $protocolo['numero']);
        //echo "Erro ao intimar o protocolo: " . $protocolo['numero'];
    }    
   

   
      }else if($acao == "novo"){
    $listaOcorrencias = $daoOcorrencia->buscarOcorrencias();
    require './cabecalho.php';
    require './formOcorrencia.php';
    require './rodape.php';
    require './erros.php';
} 
