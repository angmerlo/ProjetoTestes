<?php


require_once './Intima.php';
$daoIntima = new Intima();
  
    if(!isset($_GET['acao'])){
    $acao = "index";
}else{
    $acao = $_GET['acao'];
}
//
if($acao == "index"){
    $listaProtocolo = $daoIntima->buscarTodos();
    require './cabecalho.php';
    require './rodape.php';   
}else if($acao == "cadastrar"){
    $protocolo = $_POST;
    $verificar = $daoIntima->verificar($protocolo);
    
    if($verificar)
    {
        $r = $daoIntima->insere($protocolo);
        if($r) header('Location: crudIntima.php?acao=novo&erro=2&numero='. $protocolo['numero']);
    }
    else
    { 
      $verificar2 = $daoIntima->verificarintima($protocolo);
      if ($verificar2){
          header('Location: crudIntima.php?acao=novo&erro=3&numero='. $protocolo['numero']);
          
      } else {
          
        header('Location: crudIntima.php?acao=novo&erro=1&numero='. $protocolo['numero']);
        //echo "Erro ao intimar o protocolo: " . $protocolo['numero'];
    }    
  }

   
      }else if($acao == "novo"){
    $listaModo = $daoIntima->buscarModo();
    require './cabecalho.php';
    require './erros.php';
    require './formIntima.php';
    require './rodape.php';
} 



