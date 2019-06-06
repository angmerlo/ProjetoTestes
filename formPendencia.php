<div class="container">
    
    <center><a tabindex="0" class="btn btn-lg btn-danger" role="button" data-toggle="popover" data-trigger="focus" title="Lançar Protocolos Pendentes">PENDENTES</a></center>

    <?php
        $acao;
        if(isset($protocolo)){
            //acao deve ser de atualizacao
            $acao = "crudPendencia.php?acao=atualizar&id=".$protocolo['id'];
        }else{
            $acao = "crudPendencia.php?acao=cadastrar";
        }
    ?>


    <form name="cadastroProtocolo" action="<?php echo $acao; ?>"
          method="POST">
        <div class="form-group">
            <label>Número</label>
             <input type="number" name="numero"  required 
                   class="form-control" 
                   placeholder="Informe o número do Protocolo"
                   value="<?php if(isset($protocolo)) echo $protocolo['numero']; ?>">
        </div>
        
    <div>
         
           
    
        <div>
         
            <button class="btn btn-danger">Enviar</button>                       
        </div>
        
          <ul class="nav navbar-nav navbar-right">
           <li class="active"><a href="index.php">Voltar</a></li>
          </ul>
        
        
    </form>
</div>

