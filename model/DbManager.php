<?php 
namespace Model;
use PDO;

class DbManager
{

    public function GetDb($Query)
    {
        $InitDb= DbManager::Connexion();
        $Req = $InitDb->prepare($Query);
        $Req->execute();
        $GetDb = $Req->fetchAll(PDO::FETCH_ASSOC);

        return $GetDb;
    }

    public function UpdateDb($Query, $InitDbParam)
    {
        $InitDb=DbManager::Connexion();
        $Req=$InitDb->prepare($Query);
        $Req->execute(array($InitDbParam));
    }

    public function DeleteDb($DName, $ArgToDel, $ValueArg)
    {
        $InitDb=DbManager::Connexion();
        $Req=$InitDb->execute('DELETE FROM'.$DName.'WHERE'.$ArgToDel.'='.$ValueArg);
        return $Req;
    }

    static function Connexion() {
        try {
            $InitDb = new PDO('mysql:dbname=p5blog;host=localhost' , 'root', '');
            $InitDb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e) {

        }
        return $InitDb;
    }

}

