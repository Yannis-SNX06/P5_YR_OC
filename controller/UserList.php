<?php
namespace Controller;
use model;

Class Userlist
{
    public function WatchUserList()
    {
        $UserList=\model\User::GetAllUser();
        var_dump($UserList);
        
    }
    public function testPost(){
        $idtest=1;
        $id2='id';
        $content1= model\Post::GetPostById($idtest);
        return $content1;
    }
    public function testComment(){
        $idtest=1;
        $content1=model\Comment::GetComment('id', $idtest);
        return $content1;
    }
}
