<?php

namespace App\Http\Controllers;

use App\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    //获取用户信息
    public function getUser($id){

//        return UserModel::getUser($name);

//        $users = DB::table('user')
//            ->where('name', $name)
//            ->orderBy('id')
//            ->get();

        $users = UserModel::where('id', $id)
            ->orderBy('id')
            ->get();

        return dd($users);
    }

    //新增用户信息
    public function addUser($name, $sex, $age){

//        $ret = DB::table('user')->insert(
//            ['name'=>$name, 'sex'=>$sex, 'age'=>$age, 'created_at'=>now(), 'updated_at'=>now()]
//        );
//
//        $message = '新增失败';
//
//        if($ret){
//            $message = '新增成功';
//        }

        $userModel = new UserModel();

        $userModel->name=$name;
        $userModel->sex=$sex;
        $userModel->age=$age;
        $userModel->created_at=now();
        $userModel->updated_at=now();

        $ret = $userModel->save();

        $message = '新增失败';

        if($ret){
            $message = '新增成功';
        }

        return $message;
    }

    //修改用户信息
    public function updUser($id, $name, $sex, $age){

//        $ret = DB::table('user')
//            ->where('name',$name)
//            ->update(
//            ['sex'=>$sex, 'age'=>$age, 'updated_at'=>now()]
//        );

        $message = '修改失败';

        $ret = UserModel::where('id', $id)->update(
            ['name'=>$name, 'sex'=>$sex, 'age'=>$age, 'updated_at'=>now()]
        );

        if($ret){
            $message = '修改成功';
        }

        return $message;
    }

    //删除用户信息
    public function delUser($id){

//        $ret = DB::table('user')
//            ->where('name',$name)
//            ->delete();

        //通过主键删除
//        $ret = UserModel::destroy($name);

        $ret = UserModel::where('id', $id)->delete();

        $message = '删除失败';

        if($ret){
            $message = '删除成功';
        }

        return $message;
    }

    //根据用户id获取用户所发布的贴子
    public function getUserPosts($id){

        return dd((new UserModel())->getUserPosts($id));
    }
}
