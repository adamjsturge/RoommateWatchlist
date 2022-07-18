<?php

namespace AS\library;
include_once(__DIR__ . '/../library/maindb.php');

use AS\library\maindb;

class userauth {
    /**
     * Signup. Never store plaintext password in DB
     *
     * @param string $password
     * @return array
     */
    static function signup(string $email, string $password, string $username): array {
        if (empty($email) || empty($password) || empty($username)) {
            return ['result' => 'error'];
        }
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $db = new maindb;
        $query = $db->prepare('INSERT INTO users (email, password, username) VALUES (:email, :password_hash, :username)');
        $query->execute([':email' => $email, ':password_hash' => $password_hash, ':username' => $username]);
        return ['result' => 'success'];
    }

    function login(string $password): array  {
        $password_hash = '';//Get password hash from DB
        password_verify($password, $password_hash);

        return [];
    }

}