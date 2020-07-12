<?php

class CurrencyMapper extends Mapper
{
    public function getCurrency() {
        $sql = "SELECT *
            from currency";
        $stmt = $this->db->query($sql);

        $results = [];
        while($row = $stmt->fetch()) {
            $results[] = new CurrencyEntity($row);
        }
        return $results;
    }
}
