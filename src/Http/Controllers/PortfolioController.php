<?php

namespace Versatile\Portfolio\Http\Controllers;

use Versatile\Portfolio\Portfolio;
use Versatile\Core\Facades\Versatile;
use Versatile\Core\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class PortfolioController extends BaseController
{
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
