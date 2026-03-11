<?php
namespace App\Services\spread\Contracts;


/** @author Nelson Flores | nelson.flores@live.com */
Interface ISpreadService
{
    
    /**
     * @param string $sheetTitle
     * @param array $headers
     * @param array $data
     * @return void
     */
    public function generate(string $sheetTitle, array $headers, array $data): void;

    /**
     * @param string $path
     * @return string : Path to the saved file
     */
    public function save(string $path): string;

    /**
     * @param string $filename
     * @return void
     */
    public function download(string $filename): void;
}