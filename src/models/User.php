<?php 


class User extends Db
{
    public static function ajouter(array $data)
    {
        $pdo = self::getDb();
        $request = "INSERT INTO user (f_name, l_name, pseudo, password, verify_acc) VALUE (:f_name, :l_name, :pseudo, :password, 0)";
        $response = $pdo->prepare($request);
        $response->execute($data);
        return $pdo->lastInsertId();
    }

    public static function findByEmail(array $email)
    {
        $response = self::getDb()->prepare("SELECT * FROM user WHERE email = :email"); 
        $response->execute($email);
        return $response->fetch(PDO::FETCH_ASSOC);
    }
}



?>