<?php 

class Purchase extends Db
{
    public static function addOrder(array $data)
    {
        $pdo = self::getDb();
        $request = "INSERT INTO purchase (id_user, purchase_date, total, status) VALUES (:id_user, :purchase_date, :total, 'En cours de traitement')";
        $response = $pdo->prepare($request);
        $response->execute($data);
        return $pdo->lastInsertId();

    } 
}





?>