<?php 
    include 'banco.php';
    include 'ajudantes.php';
    $exibir_tabela = false;
    
    if(isset($_GET['nome'])&& $_GET['nome'] != ''){
        $tarefa = array();
        $tarefa['id'] = $_GET['id'];
        $tarefa['nome'] = $_GET['nome'];
        if(isset($_GET['descricao'])){
            $tarefa['descricao'] = $_GET['descricao'];
        }  else { 
            $tarefa['descricao'] = '';
        }
        if(isset($_GET['prazo'])){
            $tarefa['prazo'] = $_GET['prazo'];

        }else{
            $tarefa['prazo'] = '';
        }
       $tarefa['prioridade']=$_GET['prioridade'];
       if(isset($_GET['concluida'])){
           $tarefa['concluida'] = 1;
       }else{
           $tarefa['concluida'] = 2;
       } 
//               $_SESSION['lista_tarefas'][] = $tarefa;
       
       editar_tarefa($conexao,$tarefa);
       header('Location: tarefas.php');
       die();
    }
//            $lista_tarefas = array();
//            if (isset($_GET['nome'])) {
//                $lista_tarefas = $_SESSION['lista_tarefas'];
//            }

    $tarefa = buscar_tarefa($conexao, $_GET['id']);
    //$lista_tarefas['prazo'] = $_GET['prazo'];
    include "template.php";
   