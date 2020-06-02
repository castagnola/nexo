<?php

namespace Nexo\Http\Controllers;

use Illuminate\Http\Request;

use Nexo\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use Nexo\Http\Requests\ServiceRecurrenceDateCreateRequest;
use Nexo\Http\Requests\ServiceRecurrenceDateUpdateRequest;
use Nexo\Repositories\ServiceRecurrenceDateRepository;
use Nexo\Validators\ServiceRecurrenceDateValidator;


class ServiceRecurrenceDatesController extends Controller
{

    /**
     * @var ServiceRecurrenceDateRepository
     */
    protected $repository;

    /**
     * @var ServiceRecurrenceDateValidator
     */
    protected $validator;


    public function __construct(ServiceRecurrenceDateRepository $repository, ServiceRecurrenceDateValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $serviceRecurrenceDates = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $serviceRecurrenceDates,
            ]);
        }

        return view('serviceRecurrenceDates.index', compact('serviceRecurrenceDates'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('serviceRecurrenceDates.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  ServiceRecurrenceDateCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRecurrenceDateCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $serviceRecurrenceDate = $this->repository->create($request->all());

            $response = [
                'message' => 'ServiceRecurrenceDate created.',
                'data'    => $serviceRecurrenceDate->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessage()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $serviceRecurrenceDate = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $serviceRecurrenceDate,
            ]);
        }

        return view('serviceRecurrenceDates.show', compact('serviceRecurrenceDate'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $serviceRecurrenceDate = $this->repository->find($id);

        return view('serviceRecurrenceDates.edit', compact('serviceRecurrenceDate'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  ServiceRecurrenceDateUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(ServiceRecurrenceDateUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $serviceRecurrenceDate = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'ServiceRecurrenceDate updated.',
                'data'    => $serviceRecurrenceDate->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessage()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'ServiceRecurrenceDate deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'ServiceRecurrenceDate deleted.');
    }
}
