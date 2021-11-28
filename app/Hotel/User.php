<?php

namespace Hotel;

use Hotel\BaseService;

use Support\Configuration\Configuration;
use PDO;
class User extends BaseService
{
    const TOKEN_KEY = 'asfdhjh1idof;adlfhjadh';
    private static $currentUserId;
    
    public function getbyUserId($userId)
    {
        $parameters = [
            ':user_id' => $userId,
        ];
        // print_r($parameters);
        return $this->fetch('SELECT * FROM user WHERE user_id= :user_id', $parameters);
    }
   
    
    public function getbyEmail($email)
    {
        $parameters = [
            'email' => $email
        ];
        
        return $this->fetch('SELECT * FROM user WHERE email= :email', $parameters);
    }



    public function getList()
    {
        return $this->fetchAll('SELECT * FROM user');
    }

    

    public function insert($name, $email, $password)
    {
        //Password hash
        $passwordHash=password_hash($password, PASSWORD_BCRYPT);

        //Prepare parameters
        $parameters =[
            ':name' =>  $name,
            ':email'=> $email,
            ':password' => $passwordHash,
           
        ];
        // Prepare statement
        // $statement =$this->getPdo()->prepare('INSERT INTO user (name,email,password) VALUES (:name, :email, :password)');

        $rows = $this-> execute('INSERT INTO user (name,email,password) VALUES (:name, :email, :password)', $parameters);
        // //Bind parameters
        // $statement->bindParam(':name', $name, PDO::PARAM_STR);
        // $statement->bindParam(':email', $email, PDO::PARAM_STR);
        // $statement->bindParam(':password', $passwordHash, PDO::PARAM_STR);

        // $rows= $statement->execute();
        
        return $rows == 1; 
    }

    public function verify($email,$password)
    {
        //Retrieve user
        $user=$this->getbyEmail($email);
        // print_r($user);

        //verify password
        return password_verify($password,$user['password']);
    }

    public function generateToken($userId, $csrf='')
    {
      

        //Create token payload 
        $payload = [
            'user_id' => $userId,
            'csrf' => $csrf ?: md5(time()),
        ];
        $payloadEncoded = base64_encode(json_encode($payload));
        $signature = hash_hmac('sha256', $payloadEncoded, self::TOKEN_KEY);
       
        return sprintf('%s.%s', $payloadEncoded, $signature);
    }

    public function getTokenPayload($token)
    {
        //Get payload and signature 
        [$payloadEncoded] = explode('.', $token);
         
        //get payload
        return json_decode(base64_decode($payloadEncoded),true);
    }

    public function verifyToken($token)
    {

        //Get payload
        $payload= $this->getTokenPayload($token);
        $userId= $payload['user_id'];
        $csrf = $payload['csrf'];
    //    var_dump($this->generateToken($userId, $csrf));
    //    var_dump( $this->generateToken($userId, $csrf) == $token);die;
    //    var_dump($csrf);die;

        //Generate signature and verify
        return $this->generateToken($userId, $csrf) == $token;
    }
    public static function verifyCsrf($csrf){
        return self::getCsrf()== $csrf;
    }
    public static function getCsrf(){
        //get token payload
        $token = $_COOKIE['user_token'];
        $payload = self:: getTokenPayload($token);

        return $payload['csrf'];
    }

    public static function getCurrentUserId()
    {   
        // var_dump(self::$currentUserId);
        return self::$currentUserId;
    }

    public static function setCurrentUserId($userId)
    {
        self::$currentUserId = $userId;
    }

}