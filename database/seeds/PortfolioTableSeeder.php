<?php

use Versatile\Core\Seeders\AbstractBreadSeeder;
use Versatile\Portfolio\Portfolio;

class PortfolioTableSeeder extends AbstractBreadSeeder
{
    public function menu()
    {
        return [
            [
                'role' => 'admin',
                'title' => 'Portfolio',
                'icon_class' => 'versatile-certificate',
                'order' => 7,
                'children' => [
                    [
                        'title' => 'Posts',
                        'route' => 'versatile.portfolio.index',
                        'icon_class' => 'versatile-certificate',
                        'order' => 1,
                    ],
                    [
                        'title' => 'Categories',
                        'route' => 'versatile.portfolio-categories.index',
                        'icon_class' => 'versatile-categories',
                        'order' => 2,
                    ]
                ]
            ]
        ];
    }

    public function permissions()
    {
        return [
            [
                'name' => 'browse_portfolio',
                'description' => null,
                'table_name' => 'portfolio',
                'roles' => ['admin']
            ],
            [
                'name' => 'read_portfolio',
                'description' => null,
                'table_name' => 'portfolio',
                'roles' => ['admin']
            ],
            [
                'name' => 'edit_portfolio',
                'description' => null,
                'table_name' => 'portfolio',
                'roles' => ['admin']
            ],
            [
                'name' => 'add_portfolio',
                'description' => null,
                'table_name' => 'portfolio',
                'roles' => ['admin']
            ],
            [
                'name' => 'delete_portfolio',
                'description' => null,
                'table_name' => 'portfolio',
                'roles' => ['admin']
            ]
        ];
    }

    public function extras()
    {
        $post = Portfolio::firstOrNew(['slug' => 'my-sample-portfolio']);
        if (!$post->exists) {
            $post->fill([
                'title' => 'My Sample Portfolio Post',
                'slug' => 'my-sample-portfolio',
                'status' => 'PUBLISHED',
                'featured' => 1,
                'category_id' => 1,
                'image' => 'posts/post1.jpg',
                'excerpt' => 'Lorem ipsum die sip petris...',
                'body' => '<p>There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain. What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p><p>What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. There is no one who loves pain itself, who seeks after it and wants to have it.</p>',
                'testimonial' => '<p>There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain. What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p><p>What is Lorem Ipsum? Lorem Ipsum is simply dummy text of the printing and typesetting industry. There is no one who loves pain itself, who seeks after it and wants to have it.</p>',
                'testimonial_author' => 'John Smith',
                'meta_title' => 'Hello World! - From Pivotal',
                'meta_description' => 'There is no one who loves pain itself, who seeks after',
            ])->save();
        }
    }
}
