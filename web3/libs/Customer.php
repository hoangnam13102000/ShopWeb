<?php
class Customer extends User
{
    
    function __construct($image,$username,$password,$name,$address,$email,$status,$role)
    {
        parent::__construct($image,$username,$password,$name,$address,$email,$status,$role);

    }
     function add(){

     }
     function delete(){}
     function edit(){}
}