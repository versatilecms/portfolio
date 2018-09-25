<?php

use Versatile\Core\Seeders\AbstractBreadSeeder;
use Versatile\Portfolio\Portfolio;

class PortfolioBread extends AbstractBreadSeeder
{
    public function bread()
    {
        return [
            'name' => 'portfolio',
            'slug' => 'portfolio',
            'display_name_singular' => 'Portfolio Item',
            'display_name_plural' => 'Portfolio',
            'icon' => 'versatile-certificate',
            'model_name' => 'Versatile\\Portfolio\\Portfolio',
            'controller' => '\\Versatile\\Portfolio\\Http\\Controllers\\PortfolioController',
            'generate_permissions' => 1
        ];
    }

    public function inputFields()
    {
        return [

            'id' => [
                'type' => 'number',
                'display_name' => __('versatile::seeders.data_rows.id'),
                'required' => 1,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => '',
                'order' => 1,
            ],

            'image' => [
                'type' => 'image',
                'display_name' => __('versatile::seeders.data_rows.post_image'),
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'resize' => [
                        'width' => '1000',
                        'height' => 'null',
                    ],
                    'quality' => '70%',
                    'upsize' => true,
                    'thumbnails' => [
                        [
                            'name' => 'medium',
                            'scale' => '50%',
                        ],
                        [
                            'name' => 'small',
                            'scale' => '25%',
                        ],
                        [
                            'name' => 'cropped',
                            'crop' => [
                                'width' => '300',
                                'height' => '250',
                            ],
                        ],
                    ],
                ],
                'order' => 2,
            ],

            'title' => [
                'type' => 'text',
                'display_name' => __('versatile::seeders.data_rows.title'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'validation' => [
                        'rule' => 'required|string'
                    ]
                ],
                'order' => 3,
            ],

            'slug' => [
                'type' => 'text',
                'display_name' => __('versatile::seeders.data_rows.slug'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'slugify' => [
                        'origin' => 'title',
                        'forceUpdate' => true,
                    ],
                    'validation' => [
                        'rule' => 'required|unique:portfolio,slug'
                    ]
                ],
                'order' => 4,
            ],

            'status' => [
                'type' => 'select_dropdown',
                'display_name' => __('versatile::seeders.data_rows.status'),
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'default' => 'DRAFT',
                    'options' => [
                        'PUBLISHED' => 'Published',
                        'DRAFT' => 'Draft',
                        'PENDING' => 'Pending',
                    ],
                ],
                'order' => 5,
            ],

            'category_id' => [
                'type' => 'select_dropdown',
                'display_name' => __('versatile::seeders.data_rows.category'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 0,
                'details' => [
                    'default' => '',
                    'null' => '',
                    'options' => [
                        '' => '-- None --',
                    ],
                    'relationship' => [
                        'key' => 'id',
                        'label' => 'name',
                    ],
                ],
                'order' => 6,
            ],

            'featured' => [
                'type' => 'checkbox',
                'display_name' => __('versatile::seeders.data_rows.featured'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 7,
            ],

            'body' => [
                'type' => 'rich_text_box',
                'display_name' => __('versatile::seeders.data_rows.body'),
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 9,
            ],

            'excerpt' => [
                'type' => 'text_area',
                'display_name' => __('versatile::seeders.data_rows.excerpt'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 10,
            ],

            'testimonial' => [
                'type' => 'rich_text_box',
                'display_name' => 'Testimonial',
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 11,
            ],

            'testimonial_author' => [
                'type' => 'text',
                'display_name' => 'Testimonial Author',
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 12,
            ],

            'meta_title' => [
                'type' => 'text',
                'display_name' => __('versatile::seeders.data_rows.seo_title'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 13,
            ],

            'meta_description' => [
                'type' => 'text_area',
                'display_name' => __('versatile::seeders.data_rows.meta_description'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 14,
            ],

            'meta_keywords' => [
                'type'         => 'text_area',
                'display_name' => __('versatile::seeders.data_rows.meta_keywords'),
                'required'     => 1,
                'browse'       => 0,
                'read'         => 1,
                'edit'         => 1,
                'add'          => 1,
                'delete'       => 1,
                'details'      => '',
                'order'        => 15,
            ],

            'tags' => [
                'type' => 'text_area',
                'display_name' => __('versatile::seeders.data_rows.tags'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => '',
                'order' => 16,
            ],

            'published_date' => [
                'type' => 'date',
                'display_name' => __('versatile::seeders.data_rows.published_at'),
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => [
                    'format' => '%Y-%m-%d',
                    'validation' => [
                        'rules' => [
                            'required_if:status:PUBLISHED',
                            'date_format:YYYY-MM-DD',
                        ]
                    ]
                ],
                'order' => 17,
            ],

            'created_at' => [
                'type' => 'timestamp',
                'display_name' => __('versatile::seeders.data_rows.created_at'),
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => '',
                'order' => 18,
            ],

            'updated_at' => [
                'type' => 'timestamp',
                'display_name' => __('versatile::seeders.data_rows.updated_at'),
                'required' => 0,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
                'details' => '',
                'order' => 19,
            ]
        ];
    }

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
