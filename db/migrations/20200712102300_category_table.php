<?php

use Phinx\Migration\AbstractMigration;

class CategoryTable extends AbstractMigration
{
    public function up()
    {
        $categories_table = $this->table('categories');
        $categories_table->addColumn('category_name', 'string')
            ->create();

        $categories_table->insert([
            ["category_name" => "t-shirts"],
            ["category_name" => "shirts"],
            ["category_name" => "jeans"]
        ]);
        $categories_table->saveData();
    }

    public function down() {
        $this->dropTable('categories');
    }
}
