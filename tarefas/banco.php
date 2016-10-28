<?php
    $bdServidor = '127.0.0.1';
    $bdUsuario = 'sistematarefas';
    $bdSenha = 'sistema';
    //$bdSenha = sistema@tarefas1
    $bdBanco = 'tarefas';
       
    $conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);
    if (mysqli_connect_errno($conexao)) {
        echo "Problemas para conectar no banco. Verifique os dados!";
        die();
    }
    
    //FUNÇAO BUSCA TEREFAS
    function busca_tarefas($conexao)
    {
        $sqlBusca = 'SELECT * FROM tarefas';
        $resultado = mysqli_query($conexao, $sqlBusca);
        $tarefas = array();
        while ($tarefa = mysqli_fetch_assoc($resultado)){
            $tarefas[] = $tarefa;
        }
        return $tarefas;
    }
    
    //FUNÇÃO PARA GRAVAR A TAREFA
    function gravar_tarefa($conexao, $tarefa){
        
        $sqlGravar = "INSERT INTO tarefas(nome, descricao, prioridade,prazo,concluida)VALUES('{$tarefa['nome']}','{$tarefa['descricao']}',{$tarefa['prioridade']},'{$tarefa['prazo']}','{$tarefa['concluida']}')";
        mysqli_query($conexao, $sqlGravar);
    }

    function buscar_tarefa($conexao, $id) {
        $sqlBusca = 'SELECT * FROM tarefas WHERE id = ' . $id;
        $resultado = mysqli_query($conexao, $sqlBusca);
        return mysqli_fetch_assoc($resultado);
    }
    
    function editar_tarefa($conexao, $tarefa)
    {
        $sql = "
            UPDATE tarefas SET
                nome = '{$tarefa['nome']}',
                descricao = '{$tarefa['descricao']}',
                prioridade = {$tarefa['prioridade']},
                prazo = '{$tarefa['prazo']}',
                concluida = {$tarefa['concluida']}
            WHERE id = {$tarefa['id']}
            ";
        mysqli_query($conexao, $sql);
    }
    
    function remover_tarefa($conexao, $id){
        $sql = "DELETE FROM tarefas WHERE id = $id ";
        mysqli_query($conexao, $sql);
    }
    