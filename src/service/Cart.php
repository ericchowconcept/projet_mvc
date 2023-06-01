<?php


class Cart 
{
    public static function add($id)
    {

        //récupéré ou créer la SESSION['panier'] et on la stocké dans la variable $panier
        $panier = $_SESSION['panier'];

        // si le panier était pas vide avec l'indice $id
        if(!empty($panier[$id]))
        {
            //on incrémente la quantité pour cette id (la valeur d'indice $id)
            $panier[$id]++;
        }
        else{
            //sinon on initialise la quantité a 1 pour l'indice $id
            $panier[$id] = 1;
        }
        
        //on met a jour la SESSION['panier']
        $_SESSION['panier'] = $panier;
    }

    public static function substract($id)
    {

            $panier = $_SESSION['panier'];

            //on vérifie qu'il y ai une quantité pour le produit d'id $id et que sa quantité est suppérieur a 1 (car si je fait 1 - 1 j'arrive a 0 et donc je ne veux plus avoir l'élément dans mon panier)
            if( !empty($panier[$id]) && $panier[$id] > 1 )
            {
                $panier[$id]--;
            }
            else{
                unset($panier[$id]);
            }

            $_SESSION['panier'] = $panier;
    }



    public static function getDetailPanier()
    {
        $detailPanier = [];
       if(isset($_SESSION['panier']))
       {    
            $panier = $_SESSION['panier'];

        foreach($panier as $id => $quantity)
        {
            $produit = Product::findById(["id_product" => $id]);
            $detailPanier[] = [
                'produit' => $produit,
                'quantity' => $quantity,
                'total' => $produit['price'] * $quantity
            ];
            
        }


       }
       return $detailPanier;
    }

    public static function getTotal()
    {
        $total = 0;

        foreach(self::getDetailPanier() as $panier)
        {
            $total += $panier['total'];
        }
        return $total;
    }
}