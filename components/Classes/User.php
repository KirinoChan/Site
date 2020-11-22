<?php

    class User {
        public function login($login,$pass,$db) {
            $st = $db->prepare("select * from users where login = :login");
            $st->execute(array("login"=>$login));
            $matches = $st->fetch(PDO::FETCH_ASSOC);
            if(!empty($matches)) {
                if(password_verify($pass, $matches['password'])) {
                   echo json_encode(array("success" => "3"));
                   $_SESSION['on'] = 1;
                } else {
                    $password = $matches['password'];
                    echo json_encode(array("success" => "2"));
                }
            } else {
               echo json_encode(array("success" => "1"));
            }
        }
    }








?>