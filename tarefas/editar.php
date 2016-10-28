<?php 
    include 'banco.php';
    include 'ajudantes.php';
    $exibir_tabela = false;
    
    if(isset($_POST['nome'])&& $_POST['nome'] != ''){
        $tarefa = array();
        $tarefa['id'] = $_POST['id'];
        $tarefa['nome'] = $_POST['nome'];
        if(isset($_GET['descricao'])){
            $tarefa['descricao'] = $_POST['descricao'];
        }  else { 
            $tarefa['descricao'] = '';
        }
        if(isset($_POST['prazo'])){
            $tarefa['prazo'] = $_POST['prazo'];

        }else{
            $tarefa['prazo'] = '';
        }
       $tarefa['prioridade']=$_POST['prioridade'];
       if(isset($_POST['concluida'])){
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

    $tarefa = buscar_tarefa($conexao, $_POST['id']);
    //$lista_tarefas['prazo'] = $_GET['prazo'];
    include "template.php";
   