<fieldset>
    <legend>Menu</legend>
    <a href="controler.php?funcao=remover_all">Remover todas as tarefas!</a>
</fieldset>
<table>
            <tr>
                <th>ID</th>
                <th>Tarefas</th>
                <th>Descrição</th>
                <th>Prazo</th>
                <th>Prioridade</th>
                <th>Concluida</th>
                <th>Opções</th>
            </tr>
            <?php foreach ($lista_tarefas as $tarefa) : ?>
            <tr>
                <td><?php echo $tarefa['id']; ?></td>
                <td><?php echo $tarefa['nome']; ?></td>
                <td><?php echo $tarefa['descricao']; ?></td>
                <td><?php echo traduz_data_para_exibir($tarefa['prazo']); ?></td>
                <td><?php echo traduz_prioridade($tarefa['prioridade']); ?> </td>
                <td><?php echo traduz_concluida($tarefa['concluida']); ?></td>
                <td>
                    <a href="tarefas.php?id=<?php echo $tarefa['id']; ?>&func=editar ">Editar</a>
                    <a href="controler.php?id=<?php echo $tarefa['id']; ?>&funcao=remover">Remover</a>
                    <a href="controler.php?id=<?php echo $tarefa['id'];?>&funcao=duplicar">Duplicar</a> 
                </td>

            </tr>
            <?php endforeach; ?>
</table>
