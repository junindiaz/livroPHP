<?php
    include 'banco.php';
    include 'ajudantes.php';
    
    //Logica de entrada
    $funcao = $_GET['funcao'];
    $id = $_GET['id'];
    if($funcao=='remover'){
        remover($conexao, $id);
    }
    if($funcao=='duplicar'){
        duplicar_tarefa($conexao, $id);
    }
    if($funcao=='remover_all'){
        remover_all($conexao);
    }
    if($funcao=='editar'){
        
    }
    
    
    
    
    
    
    //função para duplicar tarefa.
    function duplicar_tarefa($conexao, $id){
        $tarefa = buscar_tarefa($conexao, $id);
        gravar_tarefa($conexao, $tarefa);
        header('Location: tarefas.php');
    }
    function remover($conexao, $id ){
        remover_tarefa($conexao, $id);
        header('Location: tarefas.php');
    }
    function remover_all($conexao){
        remover_all_tarefas($conexao);
        header('Location: tarefas.php');
    }
    