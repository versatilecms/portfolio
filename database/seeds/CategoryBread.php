<?php

use Versatile\Core\Seeders\AbstractBreadSeeder;
use Versatile\Portfolio\PortfolioCategories;

class CategoryBread extends AbstractBreadSeeder
{
    public function bread()
    {
        return [
            'name' => 'portfolio_categories',
            'slug' => 'portfolio-categories',
            'display_name_singular' => 'Category',
            'display_name_plural' => 'Categories',
            'icon' => 'versatile-categories',
            'model_name' => 'Versatile\\Portfolio\\PortfolioCategories',
            'generate_permissions' => '1',
        ];
    }

    public function inputFields()
    {
        return [
            'id' => [
                'type'         => 'number',
                'display_name' => 'ID',
                'required'     => 1,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => [
                    'validation' => [
                        'rule' => 'required|string'
                    ]
                ],
                'order'        => 1,
            ],

            'name' => [
                'type'         => 'text',
                'display_name' => 'Name',
                'required'     => 1,
                'browse'       => 1,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
                'order'        => 2,
            ],

            'slug' => [
                'type'         => 'text',
                'display_name' => 'Slug',
                'required'     => 1,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => json_encode([
                    'slugify' => [
                        'origin' => 'name',
                        'forceUpdate' => true,
                    ],
                    'validation' => [
                        'rule' => 'required|unique:portfolio_categories,slug'
                    ]
                ]),
                'order' => 3,
            ],

            'parent_id' => [
                'type'         => 'select_dropdown',
                'display_name' => 'Parent ID',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => json_encode([
                    'default' => '',
                    'null'    => '',
                    'options' => [
                        '' => '-- None --',
                    ],
                    'relationship' => [
                        'key'   => 'id',
                        'label' => 'name',
                    ],
                ]),
                'order' => 4,
            ],

            'order' => [
                'type'         => 'text',
                'display_name' => 'Order',
                'required'     => 1,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => json_encode([
                    'default' => 1,
                ]),
                'order' => 5,
            ],

            'created_at' => [
                'type'         => 'timestamp',
                'display_name' => 'Created At',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 6,
            ],

            'updated_at' => [
                'type'         => 'timestamp',
                'display_name' => 'Updated At',
                'required'     => 0,
                'browse'       => 0,
                'read'         => 0,
                'edit'         => 0,
                'add'          => 0,
                'delete'       => 0,
                'details'      => '',
                'order'        => 7,
            ]
        ];
    }

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
