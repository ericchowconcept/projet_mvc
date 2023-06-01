<?php 

class Buy extends Db
{
    public static function addBuy(array $data)
    {
        $pdo = self::getDb();
        $request = "INSERT INTO buy (id_purchase, id_product, quantity) VALUES (:id_purchase, :id_product, :quantity)"; 
        $response = $pdo->prepare($request);
        $response->execute($data);
        return $pdo->lastInsertId();
    
    
    }

}

?>