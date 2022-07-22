<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class V20220721235627 extends AbstractMigration
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
        $table = $this->table('tv_shows');
        $table->addColumn('episode_count', 'integer')
            ->addColumn('group_id', 'integer')
            ->update();

        $table = $this->table('groups');
        $table->addColumn('group_name', 'string')
            ->addColumn('user_id', 'integer')
            ->addColumn('partner_id', 'integer')
            ->create();
    }
}
