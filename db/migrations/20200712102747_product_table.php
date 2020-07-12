<?php

use Phinx\Migration\AbstractMigration;

class ProductTable extends AbstractMigration
{
    public function up()
    {
        $products_table = $this->table('products');
        $products_table->addColumn('prod_name', 'string')
            ->addColumn('prod_description', 'text')
            ->addColumn('prod_img', 'string')
            ->addColumn('category_id', 'integer')
            ->addColumn('prod_price', 'integer')
            ->addColumn('prod_currency', 'string')
            ->addForeignKey('category_id', 'categories', 'id')
            ->create();

        $products_table->insert([
            ["prod_name" => "Hoodie T-Shirt","prod_description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris efficitur posuere risus id vehicula. Mauris a purus et dolor varius efficitur. Suspendisse mattis vulputate urna feugiat maximus.","prod_img" => "https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/13.jpg", "category_id" => 1, "prod_price" => 977, "prod_currency" => "INR"],
            ["prod_name" => "Fantasy T-Shirt","prod_description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris efficitur posuere risus id vehicula. Mauris a purus et dolor varius efficitur. Suspendisse mattis vulputate urna feugiat maximus.","prod_img" => "https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/14.jpg", "category_id" => 1, "prod_price" => 3080, "prod_currency" => "INR"],
            ["prod_name" => "Ripped T-Shirt","prod_description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris efficitur posuere risus id vehicula. Mauris a purus et dolor varius efficitur. Suspendisse mattis vulputate urna feugiat maximus.","prod_img" => "https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/7.jpg", "category_id" => 1, "prod_price" => 2255, "prod_currency" => "INR"],
            ["prod_name" => "Denim Shirt","prod_description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris efficitur posuere risus id vehicula. Mauris a purus et dolor varius efficitur. Suspendisse mattis vulputate urna feugiat maximus.","prod_img" => "https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/12.jpg", "category_id" => 2, "prod_price" => 976, "prod_currency" => "INR"],
            ["prod_name" => "Black Denim Shirt","prod_description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris efficitur posuere risus id vehicula. Mauris a purus et dolor varius efficitur. Suspendisse mattis vulputate urna feugiat maximus.","prod_img" => "https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/15.jpg", "category_id" => 2, "prod_price" => 3082, "prod_currency" => "INR"],
            ["prod_name" => "Ripped Jeans","prod_description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris efficitur posuere risus id vehicula. Mauris a purus et dolor varius efficitur. Suspendisse mattis vulputate urna feugiat maximus.","prod_img" => "https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Vertical/11.jpg", "category_id" => 3, "prod_price" => 3232, "prod_currency" => "INR"]
        ]);
        $products_table->saveData();

    }

    public function down() {
        $this->dropTable('products');
    }
}
