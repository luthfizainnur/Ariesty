<?php
/*
*
*
*
*/
class Jenispastry extends Eloquent{
    protected $table = 'jenis_pastry';
    public function  produk(){
        return $this->has_many('produk');   
    }
}