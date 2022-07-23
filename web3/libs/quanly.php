<?php
abstract class quanly
{
    protected $image,$ten,$trangthai;
    function __construct($image,$ten,$trangthai)
    {
        $this->image=$image;
        $this->ten=$ten;
        $this->trangthai=$trangthai;
    }
    abstract function add();
    abstract function delete();
    abstract function edit();
}