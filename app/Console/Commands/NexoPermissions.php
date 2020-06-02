<?php

namespace Nexo\Console\Commands;

use Illuminate\Console\Command;

class NexoPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'nexo:permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check and update nexo permissions.';

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
        $permissions = config('nexo-permissions', []);

        if (!empty($permissions)) {
            $progressBar = $this->output->createProgressBar(count($permissions));
            foreach ($permissions as $roleSlug => $rolePermissions) {
                if ($roleSlug != 'all') {

                    $role = \Sentinel::findRoleBySlug($roleSlug);

                    $rolePermissionsToSave = [];

                    foreach ($rolePermissions as $rolePermission) {
                        $rolePermissionsToSave[$rolePermission] = true;
                    }

                    $role->permissions = $rolePermissionsToSave;
                    if ($role->save()) {
                        $progressBar->advance();
                    }
                }
            }
            $progressBar->finish();

            $this->info(PHP_EOL . 'Permisos actualizados correctamente.');
            return true;
        }

        $this->error('No hay permisos creados.');
        return false;
    }
}
