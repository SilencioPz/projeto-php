<?php
//Arquivos que irá se conectar
require_once '../conexoes/conexao.php';
require_once '../conexoes/DAO.php';

$userDAO = new UserDAO($pdo);

class UserDAO extends DAO {
    public function create($data) {
            $nome = $data['nome'];
            $email = $data['email'];
            $senha = $data['senha'];
        
            $sql = "INSERT INTO login_novo (nome, email, senha) VALUES (?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$nome, $email, $senha]);
        
            if ($stmt->rowCount()) {
                echo "Cadastro realizado com sucesso!";
            } else {
                die("An error ocurred.<br>");
            }
        }       

    public function read() {
        $sql = "SELECT * FROM login_novo";
        $stmt = $this->pdo->query($sql);
    
        $users = [];
        while ($row = $stmt->fetch()) {
            $users[] = [
                'id' => $row['id'],
                'nome' => $row['nome'],
                'email' => $row['email']
            ];
        }
    
        return $users;
    }    

    //Verifica o e-mail (na teoria, o único) cadastrado
    public function readByEmail($email) {
        $sql = "SELECT * FROM login_novo WHERE email = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    public function update($data) {
        $id = $data['id'];
        $nome = $data['nome'];
        $email = $data['email'];
        $senha = $data['senha'];
    
        $sql = "UPDATE login_novo SET nome = ?, email = ?, senha = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nome, $email, $senha, $id]);
    
        if ($stmt->rowCount()) {
            echo "Atualização realizada com sucesso!";
        } else {
            die("An error ocurred.<br>");
        }
    }    

    public function delete($id) {
        $sql = "DELETE FROM login_novo WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);

        if ($stmt->rowCount()) {
            echo "Deleção realizada com sucesso!";
        } else {
            die("An error ocurred.<br>");
        }
    }
}