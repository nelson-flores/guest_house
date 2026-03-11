<?php
namespace App\Services\pdf;
 

use stdClass;
use Flores;


/** @author Nelson Flores | nelson.flores@live.com */

interface IPDFService {
 

    public function setContent($content);
    public function setFooter($footer);
    public function setHeader($header);

    public function generate();
    
    public function save();

    public function rotate();

    public function download($name = null);

    public function print();    



}
