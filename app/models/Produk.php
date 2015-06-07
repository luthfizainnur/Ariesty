<?php
/*
*
*
*
*/

class Produk extends Eloquent{
    protected $table = 'produk';
    public function Jenispastry(){
        return $this->belongs_to('jenis_pastry');  
    }
}