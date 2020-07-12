<?php

class ProductMapper extends Mapper
{
    public function getProducts() {
        $sql = "SELECT *
            from products";
        $stmt = $this->db->query($sql);

        $results = [];
        while($row = $stmt->fetch()) {
            $results[] = new ProductEntity($row);
        }
        return $results;
    }

    /**
     * Get one ticket by its ID
     *
     * @param int $ticket_id The ID of the ticket
     * @return TicketEntity  The ticket
     */
    public function getProductByfilter($category, $sort) {
        if (!empty($category)){
            $sql = "SELECT *
            from products
            where category_id = :cat_id
            ORDER BY prod_price $sort";
            $stmt = $this->db->prepare($sql);
            $result = $stmt->execute(["cat_id" => $category]);
        } else{
            $sql = "SELECT *
            from products
            ORDER BY price :sort";
            $stmt = $this->db->prepare($sql);
            $result = $stmt->execute(["sort" => (!empty($sort)) ? $sort : 'asc']);
        }


        $results = [];
        if($result) {
            while ($row = $stmt->fetch()) {
                $results[] = new ProductEntity($row);
            }
        }
        return $results;
    }
}
