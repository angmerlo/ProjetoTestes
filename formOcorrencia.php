<div class="container">
    
    <center><a tabindex="0" class="btn btn-lg btn-warning" role="button" data-toggle="popover" data-trigger="focus" title="Protocolos com Ocorrências">OCORRÊNCIAS</a></center>

    <?php
        $acao;
        if(isset($protocolo)){
            //acao deve ser de atualizacao
            $acao = "crudOcorrencia.php?acao=atualizar&id=".$protocolo['id'];
        }else{
            $acao = "crudOcorrencia.php?acao=cadastrar";
        }
    ?>


    <form name="cadastroProtocolo" action="<?php echo $acao; ?>"
          method="POST">
       
        
        
    <div>
         <div class="form-group">
            <label>Ocorrências</label>

            <select name="idocorrencias" class="form-control" required>
                <?php foreach($listaOcorrencias as $m){ ?>
                <option value="<?= $m['id'];?>"
                        <?php if(isset($protocolo) && $protocolo['idocorrencias']==$m['id'])
                                echo "selected";  ?> >
                              
                       <?= $m['descricao'];?>
                </option>
                <?php } ?>
            </select>
        </div>

    
          <div class="form-group">
            <label>Observações</label>
            <input type="text" name="obs" 
                   class="form-control" 
                   placeholder="Digite uma informação relevante"
                   value="<?php if(isset($protocolo)) echo $protocolo['obs']; ?>">
            </div>
        
        <div class="form-group">
            <label>Número</label>
             <input type="number" name="numero"  required 
                   class="form-control" 
                   placeholder="Informe o número do Protocolo"
                   value="<?php if(isset($protocolo)) echo $protocolo['numero']; ?>">
        </div>
        
     
        <div>
         
            <button class="btn btn-warning">Enviar</button>                       
        </div>
        
          <ul class="nav navbar-nav navbar-right">
           <li class="active"><a href="index.php">Voltar</a></li>
          </ul>
        
        
    </form>
</div>