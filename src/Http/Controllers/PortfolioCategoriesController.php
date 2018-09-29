<?php

namespace Versatile\Portfolio\Http\Controllers;

use Versatile\Core\Http\Controllers\BaseController;
use Versatile\Portfolio\PortfolioCategories;

class PortfolioCategoriesController extends BaseController
{
    /**
     * Informs if DataType will be loaded from the database or setup
     *
     * @var bool
     */
    protected $dataTypeFromDatabase = false;

    public function setup()
    {
        $this->bread->setName('portfolio_categories');
        $this->bread->setSlug('portfolio-categories');

        $this->bread->setDisplayNameSingular('Category');
        $this->bread->setDisplayNamePlural('Categories');

        $this->bread->setIcon('versatile-categories');
        $this->bread->setModel(PortfolioCategories::class);

        $this->bread->addDataRows([
            [
                'field' => 'id',
                'type' => 'number',
                'display_name' => 'ID',
                'required' => true,
                'browse' => false,
                'read' => false,
                'edit' => false,
                'add' => false,
                'delete' => false,
                'details' => [
                    'validation' => [
                        'rule' => 'required|string'
                    ]
                ]
            ],

            [
                'field' => 'name',
                'type' => 'text',
                'display_name' => 'Name',
                'required' => true,
                'browse' => true,
                'read' => true,
                'edit' => true,
                'add' => true,
                'delete' => true,
                'details' => []
            ],

            [
                'field' => 'slug',
                'type' => 'text',
                'display_name' => 'Slug',
                'required' => true,
                'browse' => false,
                'read' => true,
                'edit' => true,
                'add' => true,
                'delete' => true,
                'details' => [
                    'slugify' => [
                        'origin' => 'name',
                        'forceUpdate' => true,
                    ],
                    'validation' => [
                        'rule' => 'required|unique:portfolio_categories,slug'
                    ]
                ]
            ],

            [
                'field' => 'parent_id',
                'type' => 'select_dropdown',
                'display_name' => 'Parent ID',
                'required' => false,
                'browse' => false,
                'read' => true,
                'edit' => true,
                'add' => true,
                'delete' => true,
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
                ]
            ],

            [
                'field' => 'order',
                'type' => 'text',
                'display_name' => 'Order',
                'required' => true,
                'browse' => false,
                'read' => true,
                'edit' => true,
                'add' => true,
                'delete' => true,
                'details' => [
                    'default' => 1,
                ]
            ],

            [
                'field' => 'created_at',
                'type' => 'timestamp',
                'display_name' => 'Created At',
                'required' => false,
                'browse' => false,
                'read' => true,
                'edit' => false,
                'add' => false,
                'delete' => false,
                'details' => []
            ],

            [
                'field' => 'updated_at',
                'type' => 'timestamp',
                'display_name' => 'Updated At',
                'required' => false,
                'browse' => false,
                'read' => false,
                'edit' => false,
                'add' => false,
                'delete' => false,
                'details' => []
            ]
        ]);
    }
}
