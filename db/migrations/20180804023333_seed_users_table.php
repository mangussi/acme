<?php


use Phinx\Migration\AbstractMigration;

class SeedUsersTable extends AbstractMigration
{
    public function up()
    {
        $password_hash = password_hash('verysecret', PASSWORD_DEFAULT);

        $this->execute("
            insert into users values (
              DEFAULT, 'Trevor', 'Sawler', 'me@here.ca', '$password_hash')
        ");
    }

    public function down()
    {
    }
}
