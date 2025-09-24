<?php 
//Conexão
include_once 'banco.php';

//Header
include_once 'header.php';
include_once 'navbar.php';
?>
    <!-- BOOTSTRAP -->
    <div class="m-5">

        <div class="col-3 mb-5">
            <h1>Consultar Produto</h1>
				 <!--(3) adicionar o atributo required ao campo text-->
                 <form action="consultar.php" method="GET">
                    <label for="filtro" class="form-label">Descrição</label>
                    <div class="d-flex column gap-2">
                    <input type="text" class="form-control" id="filtro" name="filtro" required>
                    <button type="submit" class="btn btn-primary"> Consultar</button>
                    <a href="consultar.php" class="btn btn-secondary">Limpar</a>
                    </div>
                 </form>

		</div>

        <div class="fs-1 mb-5">
            <h1>Lista de Produtos</h1>
        </div>
        <div class="table-responsive">            
            <table class="table  table-hover ">
                <thead>
                    <tr>
                        <th scope="col">DESCRIÇÃO</th>  
                        <th scope="col">DATA</th>  
                        <th scope="col">PREÇO</th>           
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <?php
                        $termo_filtro = isset($_GET['filtro']) ? htmlspecialchars($_GET['filtro']) : '';
                         $sql = "SELECT * FROM produto WHERE 1=1";

  
                        if (!empty($termo_filtro)) {
                            $sql .= " AND descricao LIKE ?";
                        }

                        $stmt = $connect->prepare($sql);
                        #$sql="SELECT * FROM produto";

                        #$resultado= mysqli_query($connect,$sql);
                        
                          if ($stmt) {
                            // 6. Vincula (bind) o parâmetro SOMENTE SE o filtro estiver sendo usado
                            if (!empty($termo_filtro)) {
                                $param_filtro = "%" . $termo_filtro . "%";
                                $stmt->bind_param("s", $param_filtro);
                            }

                            // 7. Executa a consulta
                            $stmt->execute();
                            $resultado = $stmt->get_result();
                            
                            if ($resultado->num_rows > 0):
                                // 8. CORREÇÃO do laço 'while'
                                while($linha = $resultado->fetch_assoc()):
                    ?>                            
                        <tr>
                            <td> <?php echo $linha['descricao']; ?> </td>  
                            <td> <?php echo $linha['dataProduto']; ?> </td> 
                            <td> <?php echo $linha['preco']; ?> </td>                        
                            <td>    
                                <a href='editar.php?id=<?php echo $linha['idProduto'];?>'  class="btn btn-sm btn-primary"> 
                                    <i  class="bi bi-pencil"></i>
                                </a>
                                
                                <!-- O atributo  data-bs-toggle pode ser modal ou popover. -->
                                <a href='excluir.php?id=<?php echo $linha['idProduto'];?>' class="btn btn-sm btn-danger"  data-bs-toggle='modal' data-bs-target="#exampleModal<?php echo $linha['idProduto'];?>"> 
                                    <i class="bi bi-trash-fill"></i>
                                </a>                              
                            </td>
                        </tr>

                        <!--Modal-->
                        <div class='modal fade' id="exampleModal<?php echo $linha['idProduto'];?>" tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                            <div class='modal-dialog modal-dialog-centered'>
                                <div class='modal-content'>

                                    <div class='modal-header bg-danger text-white'>
                                        <h1 class='modal-title fs-5 ' id='exampleModalLabel'>ATENÇÃO!</h1>
                                        <button type='button' class='btn-close btn-close-white' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>

                                    <div class='modal-body mb-3 mt-3'>
                                        Tem certeza que deseja <b>EXCLUIR</b> o produto <?php echo $linha['descricao'];?>?
                                    </div>

                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Voltar</button>
                                        <a href="excluir.php?id=<?php echo $linha['idProduto'];?>" type='button' class='btn btn-danger'>Sim, quero!</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>  

                        
                                              
                    <?php 
                    endwhile; 
                else:?>
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    
                    
                    
                <?php
                    endif;
                            $stmt->close();
                        } else {
                            echo "<tr><td colspan='4'>Erro na preparação da consulta.</td></tr>";
                        }
                ?>                  
                </tbody> 
            </table>
        </div>

        <br>
        <a href="adicionarprodutos.php" class="btn btn-info"> Adicionar Produto</a>
    </div>




<?php include_once 'footer.php';?>

     
 
