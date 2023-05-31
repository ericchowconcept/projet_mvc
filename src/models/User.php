<?php 


class User extends Db
{
    public static function ajouter(array $data)
    {
        $pdo = self::getDb();
        $request = "INSERT INTO user (f_name, l_name, pseudo, email, password, verify_acc, role) VALUES (:f_name, :l_name, :pseudo, :email, :password, 0, 'ROLE_USER')";
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

    public static function findAll()
    {
        $request="SELECT * FROM user";
        $response = self::getDb()->prepare($request);
        $response->execute();

        return $response->fetchAll(PDO::FETCH_ASSOC);

    }
   

    public static function modifierRole(array $data)
    {
        $response = self::getDb()->prepare("UPDATE user SET role=:role WHERE id_user =:id_user");
        return $response->execute($data);
    }


    public static function delete(array $id)
    {
        $request="DELETE FROM user WHERE id_user = :id_user";
        $response = self::getDb()->prepare($request);
        return $response->execute($id);
    }

}



?>