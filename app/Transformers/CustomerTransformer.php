<?php

namespace Nexo\Transformers;

use League\Fractal\TransformerAbstract;
use Nexo\Entities\Customer;

/**
 * Class CustomerTransformer
 * @package namespace Nexo\Transformers;
 */
class CustomerTransformer extends TransformerAbstract
{

    protected $defaultIncludes = [
        'addresses',
        'phones'
    ];

    /**
     * Transform the \Customer entity
     * @param \Customer $model
     *
     * @return array
     */
    public function transform(Customer $model)
    {
        return [
            'id' => $model->id,
            /* place your other model properties here */
            'name' => $model->name,
            'name_document' => $model->name_document,
            'first_name' => $model->first_name,
            'last_name' => $model->last_name,
            'email' => $model->email,
            'document_type' => $model->document_type,
            'document' => $model->document,
            'document_formatted' => $model->document_formatted,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
            'services_count' => (int)$model->services->count(),
            'avatar' => $model->user->avatar
        ];
    }

    public function includeAddresses(Customer $customer)
    {
        return $this->collection($customer->addresses, new CustomerAddressTransformer());
    }

    public function includePhones(Customer $customer)
    {
        return $this->collection($customer->phones, new CustomerPhoneTransformer());
    }

    /*public function includeUser(Customer $customer)
    {
        return $this->collection($customer->user, new UserTransformer());
    }*/
}