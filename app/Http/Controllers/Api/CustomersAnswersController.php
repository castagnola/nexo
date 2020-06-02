<?php

namespace Nexo\Http\Controllers\Api;


use Illuminate\Http\Request;
use Nexo\Entities\Customer;
use Nexo\Entities\PollAnswerOption;
use Nexo\Entities\ServiceStatus;
use Nexo\Http\Controllers\Controller;
use Nexo\Http\Requests;
use Nexo\Repositories\CustomerRepository;
use Nexo\Repositories\PollAnswerRepository;
use Nexo\Repositories\ServiceRepository;
use Nexo\Transformers\CustomerTransformer;
use Nexo\Transformers\PollAnswerTransformer;

class CustomersAnswersController extends Controller
{
    use ApiResponse;

    protected $repository, $serviceRepository, $transformer;

    public function __construct(PollAnswerRepository $repository, ServiceRepository $serviceRepository, PollAnswerTransformer $transformer)
    {
        $this->repository = $repository;
        $this->serviceRepository = $serviceRepository;
        $this->transformer = $transformer;
    }


    public function store(Request $request, Customer $customer)
    {
        $payload = $request->all();
        $payload['customer_id'] = $customer->id;

        $model = $this->repository->create([
            'rating' => $payload['rating'],
            'customer_id' => $customer->id,
            'poll_id' => $payload['poll_id']
        ]);

        $optionsToSave = [];

        foreach ($payload['answers'] as $questionId => $answer) {
            $optionsToSaveTemp = [
                'poll_question_id' => $questionId
            ];

            if (isset($answer['answer'])) {
                $optionsToSaveTemp['answer'] = $answer['answer'];
            }

            if (isset($answer['poll_option_id'])) {
                $optionsToSaveTemp['poll_option_id'] = $answer['poll_option_id'];
            }

            $optionsToSave[] = new PollAnswerOption($optionsToSaveTemp);
        }

        $model->options()->saveMany($optionsToSave);


        // Cambiamos de estado el servicio
        $status = ServiceStatus::where('slug', 'realizado-y-calificado')->first();

        $this->serviceRepository->update([
            'service_status_id' => $status->id
        ], $payload['service_id']);

        return $this->item($model, $this->transformer);
    }
}
