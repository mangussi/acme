<?php


use Phinx\Migration\AbstractMigration;

class AddUniqueEmailToUsers extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('users')
            ->addIndex(['email'], ['unique' => true])
            ->save();


    }
}
