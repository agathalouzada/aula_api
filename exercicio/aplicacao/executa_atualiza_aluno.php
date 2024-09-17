<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome_aluno = $_POST['nome'];
    $email_aluno = $_POST['email'];
    $curso_id = $_POST['curso_id']; 
    $id = $_GET['id'];

    $data = array("nome" => $nome_aluno, "email" => $email_aluno, "fk_cursos_id_curso" => $curso_id, "id" => $id);

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/json\r\n",
            'method'  => 'PUT',
            'content' => json_encode($data),
        ),
    );

    $context  = stream_context_create($options);
    $url = 'http://localhost/exercicio/api.php/alunos'; 
    $result = file_get_contents($url, false, $context);

    if ($result === FALSE) {
        echo "<p>Erro ao atualizar aluno.</p>";
    } else { 
    ?>
        <script>
            alert('Operação concluída com sucesso!');
            window.location.href = 'lista_alunos.php'; 
        </script>
    <?php    
    }
}
?>
