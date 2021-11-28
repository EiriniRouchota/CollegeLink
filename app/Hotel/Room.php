<?php

namespace Hotel;

use PDO;
use Hotel\BaseService;
use DateTime;


class Room extends BaseService{

    public function get($roomId){
        $parameters =[
            'room_id' => $roomId,

        ];
        return $this->fetch('SELECT * FROM room WHERE room_id = :room_id', $parameters);
    }
     public function getCities()
    {
        $cities = [];
        //Get all cities
        try{
            $rows= $this-> fetchAll('SELECT DISTINCT city FROM room');               
            foreach($rows as $row)
                {
                        $cities[]= $row['city'];
                 }
        } catch (Exception $ex){
            
            //log error

        }

        return $cities;
    }
    public function getCountofGuests()
    {
        $guests = [];
        //Get all cities
        $rows= $this-> fetchAll('SELECT DISTINCT count_of_guests FROM room');
       
       
        

        foreach($rows as $row)
        {
            $guests[]= $row['count_of_guests'];
        }

        return $guests;
    }


    public function search($checkInDate, $checkOutDate,$city='', $typeID='',  $datamax='')
    {   
        //Set up parameters
        $parameters = [
            ':check_in_date' => $checkInDate->format(DateTime::ATOM),
            ':check_out_date' => $checkOutDate->format(DateTime::ATOM),

        ];
        if (!empty($city)){
            $parameters[':city'] = $city;
        }
        if (!empty($typeID)){
            $parameters[':type_id'] = $typeID;
        }
        if (!empty($datamax)){
            $parameters[':price'] = $datamax;
        }

        $sql ='SELECT * FROM room WHERE ';
        if (!empty($city)){
            $sql .= 'city = :city AND ';
        }
        if (!empty($typeID)){
            $sql .= 'type_id = :type_id AND ';
            
        }
     
        if (!empty($datamax)){
            $sql .= 'price <= :price AND ';
            
        }


        $sql .= 'room_id NOT IN(
            SELECT room_id
            FROM booking
            WHERE check_in_date <= :check_out_date AND check_out_date >= :check_in_date)';
            
        // print_r($sql); die;
        // var_dump($sql); die;
        return $this->fetchAll($sql, $parameters);
           
   

    }
}