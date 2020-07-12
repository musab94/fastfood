<?php

class CategoryEntity
{
    protected $id;
    protected $category_name;

    /**
     * Accept an array of data matching properties of this class
     * and create the class
     *
     * @param array $data The data to use to create
     */
    public function __construct(array $data) {
        // no id if we're creating
        if(isset($data['id'])) {
            $this->id = $data['id'];
        }

        $this->category_name = $data['category_name'];
    }

    public function getId() {
        return $this->id;
    }

    public function getCategoryName() {
        return $this->category_name;
    }
}
