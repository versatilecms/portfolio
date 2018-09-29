<?php

use Versatile\Core\Seeders\AbstractBreadSeeder;
use Versatile\Portfolio\PortfolioCategories;

class CategoriesTableSeeder extends AbstractBreadSeeder
{
    public function permissions()
    {
        return [
            [
                'name' => 'browse_portfolio_categories',
                'description' => null,
                'table_name' => 'portfolio_categories',
                'roles' => ['admin']
            ],
            [
                'name' => 'read_portfolio_categories',
                'description' => null,
                'table_name' => 'portfolio_categories',
                'roles' => ['admin']
            ],
            [
                'name' => 'edit_portfolio_categories',
                'description' => null,
                'table_name' => 'portfolio_categories',
                'roles' => ['admin']
            ],
            [
                'name' => 'add_portfolio_categories',
                'description' => null,
                'table_name' => 'portfolio_categories',
                'roles' => ['admin']
            ],
            [
                'name' => 'delete_portfolio_categories',
                'description' => null,
                'table_name' => 'portfolio_categories',
                'roles' => ['admin']
            ]
        ];
    }

    public function extras()
    {
        $post = PortfolioCategories::firstOrNew(['slug' => 'uncategorized']);
        if (!$post->exists) {
            $post->fill([
                'name' => 'Uncategorized',
                'slug' => 'uncategorized',
                'parent_id' => null,
                'order' => 1,
            ])->save();
        }
    }
}
