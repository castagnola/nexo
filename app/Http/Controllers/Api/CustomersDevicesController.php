<?php

namespace Nexo\Http\Controllers\Api;


use Nexo\Entities\Customer;
use Nexo\Http\Controllers\Controller;
use Nexo\Http\Requests;

class CustomersDevicesController extends Controller
{
    use ApiResponse;

    protected $repository, $transformer;

    public function __construct()
    {
        // ----
    }

    public function index(Customer $customer)
    {
        return [
            'data' => [

            ]
        ];
    }


    public function store(Customer $customer)
    {
        return [
            'id' => 1

        ];
    }
}
