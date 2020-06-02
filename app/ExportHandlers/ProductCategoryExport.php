<?php


namespace Nexo\ExportHandlers;


class ProductCategoryExport extends \Maatwebsite\Excel\Files\NewExcelFile
{
    public function getFilename()
    {
        return 'categorias-de-productos';
    }

}