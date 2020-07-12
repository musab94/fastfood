<?php

class CategoryMapper extends Mapper
{
    public function getCategories() {
        $sql = "SELECT *
            from categories";
        $stmt = $this->db->query($sql);

        $results = [];
        while($row = $stmt->fetch()) {
            $results[] = new CategoryEntity($row);
        }
        return $results;
    }
}
