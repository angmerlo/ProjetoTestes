<?php


require_once './Pendencia.php';
$daoPendencia = new Pendencia();

if(!isset($_GET['acao'])){
    $acao = "index";
}else{
    $acao = $_GET['acao'];
}
//
if($acao == "index"){
    $listaProtocolo = $daoPendencia->buscarTodos();
    require './cabecalho.php';
    require './rodape.php';   
}else if($acao == "cadastrar"){
    $protocolo = $_POST;
    $verificar = $daoPendencia->verificar($protocolo);
    
    if($verificar)
    {
      $verificar2 = $daoPendencia->verificaintima($protocolo);
      if ($verificar2){
          header('Location: crudPendencia.php?acao=novo&erro=3&numero='. $protocolo['numero']);
      }else {
        $verificar3 = $daoPendencia->verificapendencia($protocolo);
        if ($verificar3){
          header('Location: crudPendencia.php?acao=novo&erro=7&numero='. $protocolo['numero']);
        }else{
            $r = $daoPendencia->insere($protocolo);
            if($r) header('Location: crudPendencia.php?acao=novo&erro=5&numero='. $protocolo['numero']);
        }
      }
    }
    else
    { 
        header('Location: crudPendencia.php?acao=novo&erro=1&numero='. $protocolo['numero']);
        //echo "Erro ao intimar o protocolo: " . $protocolo['numero'];
    }    
   
      }else if($acao == "novo"){
    $listaOcorrencias = $daoPendencia->buscarOcorrencias();
    require './cabecalho.php';
    require './erros.php';
    require './formPendencia.php';
    require './rodape.php';
} 



