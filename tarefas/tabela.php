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
                <td> <!-- O campo com os links para editar e remover -->
                    <a href="editar.php?id=<?php echo $tarefa['id']; ?> ">Editar</a>
                    <a href="remover.php?id=<?php echo $tarefa['id']; ?> ">Remover</a>
                </td>
            </tr>
            <?php endforeach; ?>
</table>
