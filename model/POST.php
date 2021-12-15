<?php
namespace Model;

class Post
{
    public $IdPost;
    public $Title;
    public $Chapo;
    public $Content;
    public $Author;
    public $Date;


    public function GetPostById($IdPost)
    {
        $Req='SELECT * FROM post WHERE id ='.$IdPost;
        $DbReq= \model\DbManager::GetDb($Req);
        return $DbReq;
    }

    public function GetAllPost()
    {
        $Req='SELECT * FROM post';
        $DbReq= \model\DbManager::GetDb($Req);
        return $DbReq;
    }
    public function UpdatePost($Title, $Chapo, $Content, $Author)
    {
        $DateStamp = new DateTime();
        $DateStamp = $datetime->format('d-m-Y H:i:s');
        $Date = $date->getTimestamp();
        $Req='UPDATE post(title, chapo, content, author, date_post) SET (:title, :chapo, :content, :author, :date_post) WHERE id='.$id;
        $ReqValues= array(
            ':title' => htmlspecialchars($Title),
            ':chapo' => htmlspecialchars($Chapo),
            ':content' => htmlspecialchars($Content),
            ':author' => htmlspecialchars($Author),
            ':date_post' => htmlspecialchars($Date),
        );
        $DbReq= \model\DbManager::updateDb($Req,$ReqValues);
    }
    
    public function DeletePostById($IdPost) 
    {
        DbManager::DeleteDb('post', 'id' , $IdPost);
    }
}

