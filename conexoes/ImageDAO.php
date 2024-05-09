<?php
//Arquivos que irá se conectar
require_once '../conexoes/conexaoF.php';
require_once '../conexoes/DAO.php';

class ImageDAO extends DAO {
    //Insere fotos
    public function create($data) {
        $nome = $data['nome'];
        $descricao = $data['descricao'];
        $link = $data['link'];

        $sql = "INSERT INTO imagens_link (nome, descricao, link) VALUES (?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $descricao, $link]);

        if ($stmt->rowCount()) {
            echo "Cadastro realizado com sucesso!";
        } else {
            die("An error ocurred.<br>");
        }
    }
    //Lê fotos
    public function read() {
        $sql = "SELECT * FROM imagens_link";
        $stmt = $this->pdo->query($sql);

        $images = [];
        while ($row = $stmt->fetch()) {
            $images[] = [
                'id' => $row['id'],
                'nome' => $row['nome'],
                'descricao' => $row['descricao'],
                'link' => $row['link']
            ];
        }

        return $images;
    }
    //Atualiza fotos
    public function update($data) {
        $id = $data['id'];
        $nome = $data['nome'];
        $descricao = $data['descricao'];
        $link = $data['link'];

        $sql = "UPDATE imagens_link SET nome = ?, descricao = ?, link = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $descricao, $link, $id]);

        if ($stmt->rowCount()) {
            echo "Atualização realizada com sucesso!";
        } else {
            die("An error ocurred.<br>");
        }
    }
    //Deletar fotos
    public function delete($id) {
        $sql = "DELETE FROM imagens_link WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);

        if ($stmt->rowCount()) {
            echo "Deleção realizada com sucesso!";
        } else {
            die("An error ocurred.<br>");
        }
    }
}
$imageDAO = new ImageDAO($pdoFotos);