<?php

namespace App\Services\pdf;

use Dompdf\Options;
use Dompdf\Dompdf;

use stdClass;
use Flores;
use Symfony\Component\HttpFoundation\StreamedResponse;

/** @author Nelson Flores | nelson.flores@live.com */

class DomPdfServiceImpl implements IPDFService
{
    private $header = '';
    private $footer = '';

    private $content = '';
    private $orientation = 'portrait';

    public function __construct()
    {
        set_time_limit(0);
    }


    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    public function generate(): DomPdf
    {
        $dompdf = new Dompdf();
        $dompdf->set_option('enable_php', true);
        $dompdf->loadHtml($this->content);
        $dompdf->setPaper('A4', $this->orientation);
        $dompdf->render();

        return $dompdf;
    }

    public function rotate()
    {
        $this->orientation = 'landscape';

        return $this;
    }

    public function download($name = null)
    {
        $filename = ($name ?? strtoupper(uniqid())) . '.pdf';

        return $this->generate()->stream($filename, ['Attachment' => true]);
    }

    public function print($name = null)
    {
        $filename = ($name ?? strtoupper(uniqid())) . '.pdf';

        return $this->generate()->stream($filename . '.pdf', ['Attachment' => false]);
    }

    public function save($name = null)
    {
        $filename = ($name ?? strtoupper(uniqid())) . '.pdf';
        $output = $this->generate()->output();
        file_put_contents(public_path('storage/' . $filename), $output);

        return 'storage/' . $filename;
    }

    public function downloadStream(): StreamedResponse
    {

        $fileName = uniqid().".pdf";

        return new StreamedResponse(function(){
            echo $this->generate()->output();
        }, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="'. $fileName. '"',
        ]);
    }

    public function toString()
    {
        return $this->generate()->output();
    }

    public function setHeader($header)
    {
        $this->header = $header;
        return $this;
    }

    public function setFooter($footer)
    {
        $this->footer = $footer;
        return $this;
    }
}
