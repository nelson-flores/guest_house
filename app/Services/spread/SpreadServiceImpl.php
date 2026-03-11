<?php
namespace App\Services\spread;
use App\Services\spread\Contracts\ISpreadService;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;


/** @author Nelson Flores | nelson.flores@live.com */
class SpreadServiceImpl implements ISpreadService
{
    protected Spreadsheet $spreadsheet;

    public function __construct()
    {
        $this->spreadsheet = new Spreadsheet();
    }

    /**
     * Gera uma planilha com dados e cabeçalhos.
     *
     * @param string $sheetTitle
     * @param array $headers
     * @param array $data
     */
    public function generate(string $sheetTitle, array $headers, array $data): void
    {
        $sheet = $this->spreadsheet->getActiveSheet();
        $sheet->setTitle($sheetTitle);

        // Definir cabeçalhos
        foreach ($headers as $col => $header) {
            $cell = chr(65 + $col) . '1'; // A1, B1, C1...
            $sheet->setCellValue($cell, $header);
        }

        // Preencher os dados
        foreach ($data as $row => $rowData) {
            foreach ($rowData as $col => $value) {
                $cell = chr(65 + $col) . ($row + 2); // Começa na linha 2
                $sheet->setCellValue($cell, $value);
            }
        }
    }

    /**
     * Salva o arquivo no disco.
     *
     * @param string $name
     */
    public function save($name = null): string
    {
        $filename = ($name ?? strtoupper(uniqid())).'.xlsx';
        $writer = new Xlsx($this->spreadsheet);
        $writer->save(public_path('storage/' . $filename));
        return 'storage/' . $filename;
    }

    /**
     * Envia o arquivo para download no navegador.
     *
     * @param string $filename
     */
    public function download(string $filename = 'spreadsheet.xlsx'): void
    {
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment;filename=\"{$filename}\"");
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($this->spreadsheet, 'Xlsx');
        $writer->save('php://output');
        exit;
    }

}