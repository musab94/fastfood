<?php

class CurrencyEntity
{
    protected $id;
    protected $currency_code;

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

        $this->currency_code = $data['code'];
    }

    public function getId() {
        return $this->id;
    }

    public function getCurrencyCode() {
        return $this->currency_code;
    }
}
