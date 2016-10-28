<?php session_start(); ?>
<html>
    <head>Lista de Contatos</head>
    <body>
        <h1>Lista de Contatos</h1>
        <form>
            <fieldset>
                <legend>Novo Contato</legend>
                <label>
                    Nome:
                    <input type="text" name="nome"/>
                </label>
                <label>
                    Telefone:
                    <input type="text" name="telefone"/>
                </label>
                <label>
                    Email:
                    <input type="text" name="email"/>
                </label>
                <input type="submit" value="Cadastrar" />
            </fieldset>
        </form>
        <?php
            $nome = $_GET['nome'];
            $telefone = $_GET['telefone'];
            $email = $_GET['email'];
            
            $lista_contato = array($nome,$telefone,$email);
            
            if (isset($_GET['nome'])) {
                $_SESSION['contato'][] = $lista_contato;
            }
            $tabela = array();
            
            if (isset($_GET['nome'])) {
                $tabela = $_SESSION['contato'];
            }
        ?>
        
        <table>
            <tr>
                <th>Nome</th>
                <th>Telefone</th>
                <th>Email</th>
            </tr>
            
            <?php $contato=array(); 
            foreach ($tabela as $contato) : ?>
            <tr>
                <td><?php echo $contato[0]; ?></td>
                <td><?php echo $contato[1]; ?></td>   
                <td><?php echo $contato[2] ?></td>   
            </tr>
            <?php endforeach; ?>
        </table>
        
        
    </body>
</html>

