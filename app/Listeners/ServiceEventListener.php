<?php

namespace Nexo\Listeners;

use Illuminate\Contracts\Mail\Mailer;
use Activation;
use Illuminate\Contracts\Queue\ShouldQueue;
use Nexo\Events\ServiceWasCreated;


class ServiceEventListener
{
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle user login events.
     */
    public function onCreated($event)
    {

        $model = $event;

        $customer = @$model->customer?:'';

        if($customer){

            $state = @$model->status->name?:'Pendiente';
            //$type =

            if($state == 'Pendiente'){
                $subject = $customer->first_name.', tienes un nuevo servicio disponible';
                $content = 'Tu solicitud ha sido asignada. Ingresa a nuestra <a href="'.url('').'">plataforma</a> para hacerle seguimiento. Notificaremos el estado de tu solicitud cuando uno de nuestros operadores se dirija a tu destino.';
            }else{
                $subject = $customer->first_name.', tu servicio se encuentra '.$state;
                $content = 'Tu servicio a cambiado a '.$state.'. Ingresa a este <a href="'.url('').'">link</a> para que realices el seguimiento.';
            }






            $data = [
                'email' => $customer->email,
                'name' => $customer->name,
                'first_name' => $customer->first_name,
                'last_name' => $customer->last_name,
                'with_services' => $model->with_services,
                'services' => $model->services,
                'with_products' => $model->with_products,
                'products' => $model->products,
                'code' => $model->code,
                'status' => $state,
                'verification_code' => $model->verification_code,
                'start_at' => $model->start_at->format('Y-m-d h:i A'),
                'team' => $model->team->name,
                'logo_url' => $model->team->logoUrl('small'),
                'subject' => $subject,
                'content' => $content,
            ];


            try{
                $res =  $this->mailer->send('emails.new-service', $data, function ($m) use ($data) {
                    $m->from('no-reply@nexologistica.com', 'Nexo Logística');
                    //$m->to($data['email'], $data['name'])->subject(trans('subjects.new-service', $data));
                    $m->to($data['email'], $data['name'])->subject($data['subject']);
                });
                return $res;
            }catch(\Exception $e){
                   impr($e->getMessage());
                   exit;
            }
        }
    }


    /**
     * @param $events
     */
    public function subscribe($events)
    {
        $events->listen(
            // 'Nexo\Events\ServiceWasCreated',
            'service.notification',
            'Nexo\Listeners\ServiceEventListener@onCreated'
        );
    }

}