<?php
abstract class User
{
    protected $image,$username,$password,$name,$address,$email,$status,$role;
    function __construct($image,$username,$password,$name,$address,$email,$status,$role)
    {
        $this->image=$image;
        $this->username=$username;
        $this->image=$image;
        $this->password=$password;
        $this->name=$name;
        $this->address=$address;
        $this->email=$email;
        $this->status=$status;
        $this->role=$role;

    }
    abstract protected function add();
    abstract protected function delete();
    abstract protected function edit();
}