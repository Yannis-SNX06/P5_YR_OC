<?php

namespace Model;


class Comment
{

    public $IdComment;
    public $IdPost;
    public $Author;
    public $Content;
    public $ValidationStatus;
    

    public function GetComment($SelectorGet ,$ValueSelector)
    {
        $Req='SELECT * FROM comment WHERE '.$SelectorGet.'='.$ValueSelector;
        $DbReq= \model\DbManager::GetDb($Req);
        return $DbReq;
    }

    public function GetAllCommentPost($IdPost)
    {
        $Req="SELECT * FROM comment WHERE id_post = ".$IdPost;
        $DbReq= \model\DbManager::GetDb($Req);
        return $DbReq;
    }

    public function UpdateComment($IdComment)
    {
        $Req='UPDATE comment SET (:author, :content, :comment_validation) WHERE id='.$IdComment;
        $ReqValues= array(
            ':author' => htmlspecialchars($Author),
            ':content' => htmlspecialchars($Content),
            ':comment_validation' => htmlspecialchars($ValidationStatus),
        );
        $DbReq= \model\DbManager::updateDb($Req,$ReqValues);
    }
    
    public function DeleteCommentById($IdComment) 
    {
        $DbName='comment';
        DbManager::DeleteDb($DbName, 'id' , $IdComment);
    }
}

