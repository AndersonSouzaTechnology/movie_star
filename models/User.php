<?php  // Model de usuário

  class User {

    public $id;
    public $name;
    public $lastname;
    public $email;
    public $password;
    public $image;
    public $bio;
    public $token;

    public function getFullName($user) { // Nome completo do usuário
      return $user->name . " " . $user->lastname;
    }

    public function generateToken() { // Gera um token aleatório
      return bin2hex(random_bytes(50)); // "bin2hex" Retorna uma string e "random_bytes(50)" altera para uma string com 50 carcteris
    }
    
    public function generatePassword($password) { // Criar senha
      return password_hash($password, PASSWORD_DEFAULT);
    }

    public function imageGenerateName() { // Para não correr o risco da imagem ser substituida por outro usuário
      return bin2hex(random_bytes(60)) . ".jpg";
    }

  }

  interface UserDAOInterface {

    public function buildUser($data);
    public function create(User $user, $authUser = false);
    public function update(User $user, $redirect = true);
    public function verifyToken($protected = false);
    public function setTokenToSession($token, $redirect = true);
    public function authenticateUser($email, $password);
    public function findByEmail($email);
    public function findById($id);
    public function findByToken($token);
    public function destroyToken();// Realiza o logout (sair)
    public function changePassword(User $user);

  }