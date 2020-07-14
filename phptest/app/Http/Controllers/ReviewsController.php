<?php

namespace App\Http\Controllers;

use App\ReviewsModel;

class ReviewsController extends Controller
{

    //通过查询作用域获取帖子评论列表
    public function getReviews($postsid){

        $reviews = ReviewsModel::checkflage()->reviewspostsid($postsid)
            ->orderBy('id')
            ->get();

        return dd($reviews);
    }

    //新增帖子评论
    public function addReviews($postsid, $userid, $content){

        $reviewsModel = new ReviewsModel();
        $reviewsModel->postsid=$postsid;
        $reviewsModel->userid=$userid;
        $reviewsModel->content=$content;

        $ret = $reviewsModel->save();

        $message = '新增评论失败';

        if($ret){
            $message = '新增评论成功';
        }

        return $message;
    }

    //审核评论
    public function checkReviews($id, $flage){

        $message = '审核失败';

        $ret = ReviewsModel::where('id', $id)->update(
            ['checkflage'=>$flage]
        );

        if($ret){
            $message = '审核成功';
        }

        return $message;
    }

    //获取评论数
    public function getCouReviews($postsid){

        $reviews = new ReviewsModel();
        $reviews->reviews_cou = $postsid;

        $cou = $reviews['reviews_cou'];

        return $cou;
    }
}
