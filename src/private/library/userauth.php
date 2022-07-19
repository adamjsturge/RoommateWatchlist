<?php

namespace AS\library;
include_once(__DIR__ . '/../library/maindb.php');

use AS\library\maindb;
use PDO;

class userauth {
    /**
     * Signup. Never store plaintext password in DB
     *
     * @param string $password
     * @return array
     */
    static function signup(string $email, string $password, string $username): array {
        if (empty($email) || empty($password) || empty($username) || self::creds_in_use($email, $username)) {
            return ['result' => 'error'];
        }
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $db = new maindb;
        $query = $db->prepare('INSERT INTO users (email, password, username) VALUES (:email, :password_hash, :username) RETURNING id');
        $query->execute([':email' => $email, ':password_hash' => $password_hash, ':username' => $username]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return ['result' => 'success', 'user_id' => $result['id']];
    }

    static function login(string $password): array {
        $password_hash = '';//Get password hash from DB
        password_verify($password, $password_hash);

        return [];
    }

    static function creds_in_use(string $email, string $username): bool {
        //Check if email or username are in us
        $db = new maindb;
        $query = $db->prepare('SELECT 1 FROM users WHERE email = :email OR username = :username');
        $query->execute([':email' => $email, ':username' => $username]);
        $result = $query->fetchColumn();

        return !empty($result);
    }

}