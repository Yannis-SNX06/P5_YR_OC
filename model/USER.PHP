<?php
namespace Model;

class User
{
    private $IdUser;
    private $FirstName;
    private $LastName;
    private $Mail;
    private $Phone;


    public function GetUser($IdUser)
    {
        $Req='SELECT * FROM user WHERE id ='.$IdUser;
        $Dr= \model\DbManager::GetDb($Req);
        return $Dr;
    }

    public function GetAllUser()
    {
        $Req='SELECT * FROM user';
        $DbReq= \model\DbManager::GetDb($Req);
        return $DbReq;
    }
    public function UpdateUser($IdUser,$FirstLastName,$Mail,$Phone){
        $id=htmlspecialchars($IdUser);
        $FLName= explode('', $FirstLastName);
        $FirstName= $FLName[0];
        $LastName= $FLName[1];
        $Req='UPDATE user(first_name, last_name, mail, phone) SET (:first_name, :last_name,:mail,:phone) WHERE id='.$IdUser;
        $ReqValues= array(
            ':first_name' => htmlspecialchars($FirstName),
            ':last_name' => htmlspecialchars($LastName),
            ':mail' => htmlspecialchars($Mail),
            ':phone' => htmlspecialchars($Phone),
        );
        $DbReq= \model\DbManager::updateDb($Req,$ReqValues);
    }
    
    public function DeleteUserById($IdUser)
    {
        DbManager::DeleteDb('user', 'id' , $IdUser);
    }
}