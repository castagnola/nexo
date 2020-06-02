<?php

namespace Nexo\Http\Controllers;

use Nexo\Entities\Team;
use Nexo\ExportHandlers\ProductCategoryExport;
use Nexo\ExportHandlers\ProductCategoryExportHandler;
use Illuminate\Http\Request;
use Excel;
use Nexo\Repositories\ProductCategoryRepository;


/**
 * Class HomeController
 * @package Nexo\Http\Controllers
 */
class ExportController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function productsCategoriesGuide(Team $team)
    {
        $name = 'Guía de importación de categorías de productos';

        Excel::create(str_slug($name), function ($excel) {
            $excel->sheet('Sheetname', function ($sheet) {

                // Append multiple rows
                $sheet->rows([
                    ['Nombre', 'Descripción'],
                    ['Categoría 1', 'Ejemplo de descripción para la categoría 1'],
                    ['Categoría 2', 'Ejemplo de descripción para la categoría 2']
                ]);

                // Set black background
                $sheet->row(1, function ($row) {
                    // call cell manipulation methods
                    $row->setBackground('#F44336');
                    $row->setFontColor('#FFFFFF');
                });
            });
        })->export('xls');
    }

    public function productsGuide(Team $team)
    {
        $name = 'Guía de importación de productos';

        Excel::create(str_slug($name), function ($excel) {
            $excel->sheet('Sheetname', function ($sheet) {

                // Append multiple rows
                $sheet->rows([
                    ['Categoria ID', 'Nombre', 'Descripción', 'Peso', 'Unidad de peso', 'Altura', 'Unidad de altura', 'Profundidad', 'Unidad de profundidad', 'Ancho', 'Unidad de ancho', 'Código'],
                    ['1', 'Producto 1', 'Ejemplo de descripción para el producto 1', '10.00', 'gr', '5.00', 'cm', '10.00', 'cm', '7.00', 'mt', '12345'],
                    ['1', 'Producto 2', 'Ejemplo de descripción para el producto 2', '4.00', 'lb', '5.00', 'cm', '3.00', 'cm', '6.00', 'cm', '54321']
                ]);

                // Set black background
                $sheet->row(1, function ($row) {
                    // call cell manipulation methods
                    $row->setBackground('#F44336');
                    $row->setFontColor('#FFFFFF');
                });
            });
        })->export('xls');
    }

    public function productsCategoriesExport(Team $team)
    {
        $ProductCategoryRepository = app(ProductCategoryRepository::class);

        $ProductCategory = $ProductCategoryRepository->all(['id', 'name', 'description']);

        /*foreach($ProductCategory AS $item) {
            var_dump($item);
        }*/

        Excel::create('productos categorias', function($excel) use($ProductCategory) {

            $excel->sheet('Usuarios', function($sheet) use($ProductCategory) {
                
                $head = [
                    'ID',
                    'Nombre',
                    'Descripción'
                ];

                $sheet->appendRow($head);
                $sheet->fromArray($ProductCategory, null, 'A2', false, false);
                $sheet->setAutoFilter();
            });

        })->export('xls');

        //dd($ProductCategory);
    }

    public function servicesGuide(Team $team)
    {
        $name = 'Guía de importación de servicios';

        Excel::create(str_slug($name), function ($excel) {
            $excel->sheet('Sheetname', function ($sheet) {

                // Append multiple rows
                $sheet->rows([
                    ['Nombre', 'Tiempo', 'Descripción'],
                    ['Servicio 1', '10;22', 'Ejemplo de descripción para el Servicio 1'],
                    ['Servicio 2', '05:33', 'Ejemplo de descripción para el Servicio 2']
                ]);

                // Set black background
                $sheet->row(1, function ($row) {
                    // call cell manipulation methods
                    $row->setBackground('#F44336');
                    $row->setFontColor('#FFFFFF');
                });
            });
        })->export('xls');
    }
}
