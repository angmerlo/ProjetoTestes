<div class="container">
    
    <center><a tabindex="0" class="btn btn-lg btn-success" role="button" data-toggle="popover" data-trigger="focus" title="Intimar Protocolos" data-content="Intimar Protocolos">INTIMAÇÃO</a></center>

    <?php
        $acao;
        if(isset($protocolo)){
            //acao deve ser de atualizacao
            $acao = "crudIntima.php?acao=atualizar&id=".$protocolo['id'];
        }else{
            $acao = "crudIntima.php?acao=cadastrar";
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
         <div class="form-group">
            <label>Modo</label>

           <select name="idmodo" class="form-control" required>
                <?php foreach($listaModo as $m){ ?>
                <option value="<?= $m['id'];?>"
                        <?php if(isset($protocolo) && $protocolo['idmodo']==$m['id'])
                                echo "selected";  ?> >
                       <?= $m['descricao'];?>
                </option>
                <?php } ?>
            </select>
        </div>

    
        
     
        <div>
         
            <button class="btn btn-success">Enviar</button>                       
        </div>
        
          <ul class="nav navbar-nav navbar-right">
           <li class="active"><a href="index.php">Voltar</a></li>
          </ul>
        
        
    </form>
</div>