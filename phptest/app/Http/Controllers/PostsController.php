<?php

namespace App\Http\Controllers;

use App\DzinfoModel;
use App\PostsModel;
use App\ReviewsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller{

    //获取帖子信息
    public function getPosts($id){

        $posts = PostsModel::where('id', $id)
            ->orderBy('id')
            ->get();

        return dd($posts);
    }

    //新增帖子信息
    public function addPosts($titel, $content, $creatorId){

        $postsModel = new PostsModel();
        $postsModel->titel=$titel;
        $postsModel->content=$content;
        $postsModel->creatorId=$creatorId;
        $postsModel->created_at=now();
        $postsModel->updated_at=now();

        $ret = $postsModel->save();

        $message = '新增失败';

        if($ret){
            $message = '新增成功';
        }

        return $message;
    }

    //修改帖子信息
    public function updPosts($id, $titel, $content){

        $message = '修改失败';

        $ret = PostsModel::where('id', $id)->update(
            ['titel'=>$titel, 'content'=>$content, 'updated_at'=>now()]
        );

        if($ret){
            $message = '修改成功';
        }

        return $message;
    }

    //删除帖子信息
    public function delPosts($id){

        //删除点赞信息
        $delDzinfo = DzinfoModel::where('postsid', $id)->delete();

        $message = '删除失败';

        //删除评论
        $delreviews = ReviewsModel::where('postsid', $id)->delete();

        //删除文章
        $ret = PostsModel::where('id', $id)->delete();

        if($ret){
            $message = '删除成功';
        }

        return $message;
    }

    //帖子点赞
    public function addDzinfo($postsid, $userid){

        $message = '点赞失败';

        //增加点赞数量
        $ret = PostsModel::where('id', $postsid)->increment('dianzan');

        if($ret){

            //新增点赞信息
            $dzinfoModel = new DzinfoModel();
            $dzinfoModel->postsid=$postsid;
            $dzinfoModel->userid=$userid;
            $dzinfoModel->created_at=now();
            $dzinfoModel->updated_at=now();

            $ret2 = $dzinfoModel->save();

            if($ret2){
                $message = '点赞成功';
            }
        }

        return $message;
    }

    //获取点赞信息
    public function getDzinfo($postsid){

        $post = PostsModel::findOrFail($postsid);
        return $post->user;
    }

}
