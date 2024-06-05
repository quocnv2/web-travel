<?php

namespace App\Http\Controllers\UserController\Blog;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommentBlog\createRequest;
use App\Models\Blog;
use App\Models\Category;
use App\Models\CommentBlog;
use Illuminate\Http\Request;

class blogController extends Controller
{
    public function listBlog(Category $category, Blog $blog)
    {
        $categories = $category->get_orderBy_ASC();
        $blog_new = $blog->get_orderBy_ASC_status_page();
        $blog_list = $blog->get_orderBy_ASC_status_page_8();
        return view('Home.Layout.Pages.Blog.list_blog', compact('categories', 'blog_new', 'blog_list'));
    }

    public function listBlog_Category(Category $category, Blog $blog, $slug)
    {
        $objCategory = $category->get_link_slug($slug);
        $slugCate = $slug;
        if (!$objCategory) {
            return redirect()->route('error404');
        }

        $categories = $category->get_orderBy_ASC();
        $blog_new = $blog->get_orderBy_ASC_status_page();
        $blog_list = $blog->get_orderBy_ASC_status_where_category_page_8($objCategory->id);
        return view('Home.Layout.Pages.Blog.list_blog', compact('categories', 'blog_new', 'blog_list', 'objCategory'));
    }

    public function detailBlog(Category $category, Blog $blog, CommentBlog $commentBlog, $slug)
    {
        $objBlog = $blog->get_link_slug($slug);
        if (!$objBlog) {
            return redirect()->route('error404');
        }

        $categories = $category->get_orderBy_ASC();
        $blog_new = $blog->get_orderBy_ASC_status_page();
        $listCommentBlog = $commentBlog->where('idBlog', $objBlog->id)->orderBy('id', 'DESC')->get();
        return view('Home.Layout.Pages.Blog.blog_details', compact('categories', 'blog_new', 'objBlog', 'listCommentBlog'));
    }

    public function create_comment_blog(createRequest $req, CommentBlog $commentBlog, Blog $tourBlog, $slug)
    {
//        dd($req->all());
        $create = $commentBlog->create_comment_blog($req);
        $objBlog = $tourBlog->get_link_slug($slug);
        if ($create) {
            return redirect()->route('create_comment_blog', ['slug' => $slug, 'blog' => $objBlog])->with('success', 'Thêm Mới Thành Công!');
        } else {
            return redirect()->back()->with('Error', 'Thêm Mới Thất Bại!');
        }
    }

    public function getCommentBlog(Request $request)
    {
        $blogId = $request->blogId; // Assuming 'blogId' is passed as a query parameter

        $comments = CommentBlog::where('idBlog', $blogId)
            ->orderBy('id', 'desc')
            ->paginate(3);

        if ($comments->isEmpty()) {
            return response()->json([
                'data' => [],
                'message' => 'No comments found for this blog'
            ], 200);
        }

        return response()->json($comments);
    }


}
