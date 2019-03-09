<?php
class Auth {
    public $db = "";

    function __construct(QueryBuilder $db)
    {
        $this->db = $db;
    }

    public function register($email, $pass) {

        $data = [
            'email' => $email,
            'password' => md5($pass)
        ];
        $isAloneUser = $this->db->getOneForData('users', ['email' => $email]);

        if(!$isAloneUser) {
            $this->db->store('users', $data);
            return true;
        } else {
           return false;
        }

    }

    public  function login($email, $pass) {
        $user = $this->db->getOneForData('users',[
            'email' => $email,
            'password' => md5($pass)
        ]);

        if($user) {
            $_SESSION['user'] = $user;
            return true;
        } else {
            return false;
        }


    }

    public function isLogin() {
        if(isset($_SESSION['user'])){
            return true;
        }
        return false;
    }

    public function logout() {
        if($this->isLogin()) {
            unset($_SESSION['user']);
            echo "Log out";
        } else {
            echo "Чтобы выйти, сначала войдите!";
        }

    }

    public function currentUser() {
        if($this->isLogin()) {

            return $_SESSION['user'];
        }
        return false;
    }
    public function remove($email,$pass) {
        $data = [
            'email' => $email,
            'password' => md5($pass)
        ];
        $user = $this->db->getOneForData('users',$data);
        if($user) {
            $this->db->deleteForData('users',$data);
        }

    }

    public function getUserStatus($email) {
        $user = $this->db->getOneForData('users',[
           'email' => $email
        ]);
        if($user){
            if(!$user['isBan']) {
                return 'noBan';
            } else {
                return 'ban';
            }

        } else {
                return 'user404';
        }
    }

    public  function ban($email) {
        $data = [
            'email' => $email
        ];
        $user = $this->db->getOneForData('users',$data);
        $dataForUpdate = [
            'id' => $user['id'],
            'isBan' => 1
        ];
        if($this->getUserStatus($email) == "noBan") {
            $this->db->update('users', $dataForUpdate);
            echo "Пользователь с ником " . $user['email'] . " успешно забанен! <br>";
        } else {
            echo "Пользователь с ником " . $user['email'] . " уже забанен! <br>";
        }

    }

    public function unBan($email) {
        $data = [
            'email' => $email
        ];
        $user = $this->db->getOneForData('users',$data);
        $dataForUpdate = [
            'id' => $user['id'],
            'isBan' => 0
        ];
        if($this->getUserStatus($email) == "ban") {
            $this->db->update('users', $dataForUpdate);
            echo "Пользователь с ником " . $user['email'] . " успешно разбанен! <br>";
        } else {
            echo "Пользователь с ником " . $user['email'] . " уже разбанен! <br>";
        }
    }
}