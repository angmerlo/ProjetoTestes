<?php

if(!isset($_GET['erro'])){
    $erro = "";
}else{
    $erro = $_GET['erro'];
}
if(!isset($_GET['numero'])){
    $numero = "";
}else{
    $numero = $_GET['numero'];
}
if($erro == 1)
{
     echo "<div class=' alert alert-danger'> 
                       Erro ao intimar o protocolo: " . $numero . " protocolo não existe no banco de dados" . 
                       "</div>";
    
   
} else if ($erro == 2){
    
    echo "<div class=' alert alert-success'> 
                       Protocolo: " . $numero . " intimado com sucesso!!" . 
                       "</div>";
    
    
}  else if ($erro == 3){
    
    echo "<div class=' alert alert-warning'> 
                       Protocolo: " . $numero . " já está intimado no sistema!!" . 
                       "</div>";
    
    
} else if($erro == 4)
{
     echo "<div class=' alert alert-danger'> 
                       Erro ao Registrar a Ocorrência do protocolo: " . $numero . " protocolo não existe no banco de dados" . 
                       "</div>";
    
   
} else if ($erro == 5){
    
    echo "<div class=' alert alert-success'> 
                       Protocolo: " . $numero . " registrado com sucesso!!" . 
                       "</div>";
    
    
}  else if ($erro == 6){
    
    echo "<div class=' alert alert-warning'> 
                       Protocolo: " . $numero . " já está intimado no sistema!!" . 
                       "</div>";
    
    
} else if ($erro == 7){
    
    echo "<div class=' alert alert-warning'> 
                       Protocolo: " . $numero . " já está lançado como pendente no sistema!!" . 
                       "</div>";
    
}
?>


