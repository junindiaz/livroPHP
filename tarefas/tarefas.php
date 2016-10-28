<?php 
    include 'banco.php';
    include 'ajudantes.php';
    $exibir_tabela = true;
    session_start();
            if(isset($_POST['nome'])&& $_POST['nome'] != ''){
                $tarefa = array();
                $tarefa['nome'] = $_POST['nome'];
                if(isset($_POST['descricao'])){
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
               gravar_tarefa($conexao,$tarefa);
               header('Location: tarefas.php');
               die();
            }
//            $lista_tarefas = array();
//            if (isset($_GET['nome'])) {
//                $lista_tarefas = $_SESSION['lista_tarefas'];
//            }
            
            $lista_tarefas = busca_tarefas($conexao);
            //$lista_tarefas['prazo'] = $_GET['prazo'];
            $tarefa = array(
                'id' =>0,
                'nome' =>'',
                'descricao' => '',
                'prazo' => '',
                'prioridade' => 1,
                'concluida' => ''
            );
            
            include "template.php";
       
            
        