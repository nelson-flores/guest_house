<?php

namespace App\Services\pdf;

use App\Services\pdf\IPDFService;
use Mpdf\Mpdf;
use Illuminate\Support\Facades\Auth;

use stdClass;
use Flores;


/** @author Nelson Flores | nelson.flores@live.com */
class MPdfServiceImpl implements IPDFService
{

    private $footer = '';
    private $header = '';

    private $content = '';
    private $options =  [
        'mode' => 'utf-8',
        'format' => 'A4',
        'default_font_size' => 0,
        'default_font' => '',
        'margin_left' => 15,
        'margin_right' => 15,
        'margin_top' => 16,
        'margin_bottom' => 16,
        'margin_header' => 9,
        'margin_footer' => 9,
        'orientation' => 'P',
    ];

    public function __construct()
    {
        $this->options['tempDir'] =  public_path('storage/files/cache');
    }

    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    public function generate(): Mpdf
    {
        ini_set('pcre.backtrack_limit', '5000000');
        try {
            $mpdf = new \Mpdf\Mpdf($this->options);
            $mpdf->setFooter(
                empty($this->footer) ? '' : '<span style="float: left">' . $this->footer . '</span>' . ' - ' .
                    '{PAGENO}'
            );

            $mpdf->WriteHTML($this->content);

            return $mpdf;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function rotate()
    {
        $this->options['orientation'] = $this->options['orientation'] == 'L' ? 'P' : 'L';

        return $this;
    }

    public function download($name = null)
    {
        $filename = ($name ?? strtoupper(uniqid())) . '.pdf';

        return $this->generate()->Output($filename, public_path('storage/')); //'D');
    }

    public function print()
    {
        return $this->generate()->Output();
    }

    public function save($name = null)
    {
        $filename = ($name ?? strtoupper(uniqid())) . '.pdf';

        $this->generate()->Output(public_path('storage/' . $filename), 'F');

        return 'storage/' . $filename;
    }

    public function toString()
    {
        return $this->generate()->Output();
    }

    public function setFooter($footer)
    {
        $this->footer = $footer;
        return $this;
    }

    public function setHeader($header)
    {
        $this->header = $header;
        return $this;
    }
}
