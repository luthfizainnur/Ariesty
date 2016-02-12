<?php
class PrintController extends \BaseController 
{
    public function index()
    {
        $pdf = PDF::loadView('hasil');
        return $pdf->stream();
    }
}