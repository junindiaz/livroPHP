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
                setcookie('lista_contato[0]', $lista_contato[0] );
                setcookie('lista_contato[1]', $lista_contato[1] );
                setcookie('lista_contato[2]', $lista_contato[2] );
            }
            $tabela = array();
            
            if (isset($_GET['nome'])) {
                $tabela = $_COOKIE['lista_contato'];
                
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
                <td><?php echo $contato; ?></td>
                
                
            </tr>
            <?php endforeach; ?>
        </table>
        
        
    </body>
</html>

