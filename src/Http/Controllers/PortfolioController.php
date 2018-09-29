<?php

namespace Versatile\Portfolio\Http\Controllers;

use Versatile\Portfolio\Portfolio;
use Versatile\Core\Http\Controllers\BaseController;

class PortfolioController extends BaseController
{
    /**
     * Informs if DataType will be loaded from the database or setup
     *
     * @var bool
     */
    protected $dataTypeFromDatabase = false;

    public function setup()
    {
        $this->bread->setName('portfolio');
        $this->bread->setSlug('portfolio');

        $this->bread->setDisplayNameSingular('Portfolio Item');
        $this->bread->setDisplayNamePlural('Portfolio Item');

        $this->bread->setIcon('versatile-certificate');
        $this->bread->setModel(Portfolio::class);

        $this->bread->addDataRows([

            [
                'field' => 'id',
                'type' => 'number',
                'display_name' => __('versatile::seeders.data_rows.id'),
                'required' => true,
                'browse' => false,
                'read' => false,
                'edit' => false,
                'add' => false,
                'delete' => false,
                'details' => '',
                'order' => 1,
            ],

            [
                'field' => 'image',
                'type' => 'image',
                'display_name' => __('versatile::seeders.data_rows.post_image'),
                'required' => false,
                'browse' => true,
                'read' => true,
                'edit' => true,
                'add' => true,
                'delete' => true,
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

            [
                'field' => 'title',
                'type' => 'text',
                'display_name' => __('versatile::seeders.data_rows.title'),
                'required' => true,
                'browse' => true,
                'read' => true,
                'edit' => true,
                'add' => true,
                'delete' => true,
                'details' => [
                    'validation' => [
                        'rule' => 'required|string'
                    ]
                ],
                'order' => 3,
            ],

            [
                'field' => 'slug',
                'type' => 'text',
                'display_name' => __('versatile::seeders.data_rows.slug'),
                'required' => true,
                'browse' => false,
                'read' => true,
                'edit' => true,
                'add' => true,
                'delete' => true,
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

            [
                'field' => 'status',
                'type' => 'select_dropdown',
                'display_name' => __('versatile::seeders.data_rows.status'),
                'required' => true,
                'browse' => true,
                'read' => true,
                'edit' => true,
                'add' => true,
                'delete' => true,
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

            [
                'field' => 'category_id',
                'type' => 'select_dropdown',
                'display_name' => __('versatile::seeders.data_rows.category'),
                'required' => true,
                'browse' => false,
                'read' => true,
                'edit' => true,
                'add' => true,
                'delete' => false,
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

            [
                'field' => 'featured',
                'type' => 'checkbox',
                'display_name' => __('versatile::seeders.data_rows.featured'),
                'required' => false,
                'browse' => false,
                'read' => true,
                'edit' => true,
                'add' => true,
                'delete' => true,
                'details' => '',
                'order' => 7,
            ],

            [
                'field' => 'body',
                'type' => 'rich_text_box',
                'display_name' => __('versatile::seeders.data_rows.body'),
                'required' => true,
                'browse' => false,
                'read' => true,
                'edit' => true,
                'add' => true,
                'delete' => true,
                'details' => '',
                'order' => 9,
            ],

            [
                'field' => 'excerpt',
                'type' => 'text_area',
                'display_name' => __('versatile::seeders.data_rows.excerpt'),
                'required' => false,
                'browse' => false,
                'read' => true,
                'edit' => true,
                'add' => true,
                'delete' => true,
                'details' => '',
                'order' => 10,
            ],

            [
                'field' => 'testimonial',
                'type' => 'rich_text_box',
                'display_name' => 'Testimonial',
                'required' => false,
                'browse' => false,
                'read' => true,
                'edit' => true,
                'add' => true,
                'delete' => true,
                'details' => '',
                'order' => 11,
            ],

            [
                'field' => 'testimonial_author',
                'type' => 'text',
                'display_name' => 'Testimonial Author',
                'required' => false,
                'browse' => false,
                'read' => true,
                'edit' => true,
                'add' => true,
                'delete' => true,
                'details' => '',
                'order' => 12,
            ],

            [
                'field' => 'meta_title',
                'type' => 'text',
                'display_name' => __('versatile::seeders.data_rows.seo_title'),
                'required' => false,
                'browse' => false,
                'read' => true,
                'edit' => true,
                'add' => true,
                'delete' => true,
                'details' => '',
                'order' => 13,
            ],

            [
                'field' => 'meta_description',
                'type' => 'text_area',
                'display_name' => __('versatile::seeders.data_rows.meta_description'),
                'required' => false,
                'browse' => false,
                'read' => true,
                'edit' => true,
                'add' => true,
                'delete' => true,
                'details' => '',
                'order' => 14,
            ],

            [
                'field' => 'meta_keywords',
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

            [
                'field' => 'tags',
                'type' => 'text_area',
                'display_name' => __('versatile::seeders.data_rows.tags'),
                'required' => false,
                'browse' => false,
                'read' => true,
                'edit' => true,
                'add' => true,
                'delete' => true,
                'details' => '',
                'order' => 16,
            ],

            [
                'field' => 'published_date',
                'type' => 'date',
                'display_name' => __('versatile::seeders.data_rows.published_at'),
                'required' => false,
                'browse' => true,
                'read' => true,
                'edit' => true,
                'add' => true,
                'delete' => true,
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

            [
                'field' => 'created_at',
                'type' => 'timestamp',
                'display_name' => __('versatile::seeders.data_rows.created_at'),
                'required' => false,
                'browse' => false,
                'read' => true,
                'edit' => false,
                'add' => false,
                'delete' => false,
                'details' => '',
                'order' => 18,
            ],

            [
                'field' => 'updated_at',
                'type' => 'timestamp',
                'display_name' => __('versatile::seeders.data_rows.updated_at'),
                'required' => false,
                'browse' => false,
                'read' => false,
                'edit' => false,
                'add' => false,
                'delete' => false,
                'details' => '',
                'order' => 19,
            ]
        ]);
    }
    /**
     * Route: Gets all posts and passes data to a view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPosts()
    {
        $posts = Portfolio::where([
            ['status', '=', 'PUBLISHED'],
        ])->orderBy('created_at', 'desc')
            ->paginate(12);

        return view('v-theme::portfolio.posts', [
            'posts' => $posts,
        ]);
    }

    /**
     * Route: Gets a single post and passes data to a view
     *
     * @param $slug
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getPost($slug)
    {
        $post = Portfolio::where([
            ['slug', '=', $slug],
            ['status', '=', 'PUBLISHED'],
        ])->firstOrFail();

        return view('v-theme::portfolio.post', [
            'post' => $post,
        ]);
    }

    /**
     * Recent posts widget
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function recentPosts($numPosts = 4)
    {
        $posts = Portfolio::where([
            ['status', '=', 'PUBLISHED'],
        ])->limit($numPosts)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('v-theme::portfolio.posts-grid', [
            'posts' => $posts,
        ]);
    }
}
