<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class V20220723074924 extends AbstractMigration
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
        $table = $this->table('groups');
        $table->addColumn('group_name', 'string')
            ->addColumn('is_active', 'integer', ['default' => 1])
            ->create();

        $table = $this->table('group_members');
        $table->addColumn('group_id', 'integer')
            ->addColumn('user_id', 'integer')
            ->addColumn('is_active', 'integer', ['default' => 1])
            ->create();

        $table = $this->table('tv_shows');
            $table->addColumn('show_name', 'string')
            ->addColumn('rating', 'integer')
            ->addColumn('is_active', 'integer', ['default' => 1])
            ->create();

        $table = $this->table('watchlist');
            $table->addColumn('show_id', 'integer')
            ->addColumn('group_id', 'integer')
            ->addColumn('is_active', 'integer', ['default' => 1])
            ->create();

        $table = $this->table('watchlist_tv_shows');
            $table->addColumn('watchlist_id', 'integer')
            ->addColumn('episodes_watched', 'integer')
            ->addColumn('user_id', 'integer')
            ->addColumn('rating', 'integer')
            ->addColumn('is_active', 'integer', ['default' => 1])
            ->create();
    }
}
