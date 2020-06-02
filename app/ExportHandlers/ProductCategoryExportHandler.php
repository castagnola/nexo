<?php
namespace Nexo\ExportHandlers;



class ProductCategoryExportHandler implements \Maatwebsite\Excel\Files\ExportHandler
{

    public function handle(ProductCategoryExport $export)
    {
        // work on the export
        return $export->sheet('sheetName', function ($sheet) {

        })->export('xls');
    }

}