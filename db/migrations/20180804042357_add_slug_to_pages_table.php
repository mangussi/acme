<?php


use Phinx\Migration\AbstractMigration;

class AddSlugToPagesTable extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('pages')
            ->addColumn('slug', 'string', ['default' => ''])
            ->addIndex(['slug'], ['unique' => true])
            ->save();


    }
}
