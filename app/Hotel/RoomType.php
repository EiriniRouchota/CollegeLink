<?php

namespace Hotel;

use PDO;
use Hotel\BaseService;
use DateTime;


class RoomType extends BaseService{

     public function getAllTypes()
    {
        
        return $this-> fetchAll('SELECT * FROM room_type');
           
        
     }

    
   

}