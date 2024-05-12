<?php

namespace App\Http\Controllers\AdminController\Blog;

use App\Http\Controllers\Controller;
use App\Models\CommentBlog;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
    public function comment_blog_list(CommentBlog $commentBlog)
    {
        $list = $commentBlog->get_orderBy_ASC();
        return view('FEadmin.Pages.BlogComment.view_list', compact('list'));
    }


    public function detail_comment_blog(CommentBlog $commentBlog, $slug)
    {
        $objRoom = $commentBlog->get_link_slug($slug);
        return response()->json($objRoom);
    }


    //Phương thức xóa danh mục
    public function delete_comment_blog(CommentBlog $commentBlog, $slug)
    {
        // if(Auth::guard('admin')->user()->decentralization == 1){
        //     return view('FEadmin.Pages.Error.error404');
        // }

        $obj = $commentBlog->get_link_slug($slug);
        if (!$obj) {
            return view('FEadmin.Pages.Error.error404');
        }

        if ($commentBlog->delete_comment_blog($slug) > 0) {
            return redirect()->route('comment_blog_list')->with('success', 'Xóa Phản Hồi Thành Công!');
        } else {
            return redirect()->route('comment_blog_list')->with('err', 'Kiểm Tra Lại, Xóa Thất Bại!');
        }
    }
}
