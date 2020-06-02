<?php

namespace Nexo\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Nexo\Entities\Service;
use Nexo\Entities\ServiceStatus;

class SearchExpiredServices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nexo:search-expired-services';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Buscar los servicios vencidos y vencerlos.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // 1. Buscar en la tabla de servicios todos los que tengan fecha de ejecución mayor a ahora.
        // 2. Si encontramos servicios los pasamos a estado "vencido"
        // 3. Notificar a los interesados

        $yesterday = Carbon::yesterday();

        $status = ServiceStatus::firstOrCreate([
            'slug' => 'vencido',
            'name' => 'Vencido'
        ]);


        $services = Service::where('start_at', '<', $yesterday->toDateTimeString())->whereHas('status', function ($query) {
            return $query->whereNotIn('slug', ['realizado', 'realizado-y-calificado']);
        })->update([
            'service_status_id' => $status->id
        ]);
    }
}
