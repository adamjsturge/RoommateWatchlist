<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class InitialMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        //, ['null' => true]['unique' => true]['limit' => 30]
        //['id' => false, 'primary_key' => ['user_id', 'follower_id']]
        $table = $this->table('users');
        $table->addColumn('email', 'string')
            ->addColumn('password', 'string')
            ->addColumn('username', 'string')
            ->addIndex(['username', 'email'], ['unique' => true])
            ->create();
    }
}
