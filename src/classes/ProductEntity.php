<?php

class ProductEntity
{
    protected $id;
    protected $prod_name;
    protected $prod_description;
    protected $prod_img;
    protected $prod_price;
    protected $prod_currency;

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

        $this->prod_name = $data['prod_name'];
        $this->prod_description = $data['prod_description'];
        $this->prod_img = $data['prod_img'];
        $this->prod_price = $data['prod_price'];
        $this->prod_currency = $data['prod_currency'];
        $this->category_id = $data['category_id'];
    }

    public function getId() {
        return $this->id;
    }

    public function getCatId() {
        return $this->category_id;
    }

    public function getName() {
        return $this->prod_name;
    }

    public function getDescription() {
        return $this->prod_description;
    }

    public function getShortDescription() {
        return substr($this->prod_description, 0, 20);
    }

    public function getImg() {
        return $this->prod_img;
    }

    public function getPrice() {
        return $this->prod_price;
    }

    public function getCurrency() {
        return $this->prod_currency;
    }
}
