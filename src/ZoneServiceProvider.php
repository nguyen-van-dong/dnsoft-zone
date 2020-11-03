<?php

namespace Module\ZoneModule;

use Dnsoft\Core\Support\BaseModuleServiceProvider;
use Illuminate\Support\Facades\Event;
use Module\ZoneModule\Console\Commands\DownloadCommand;
use Module\ZoneModule\Console\Commands\UpdateCommand;
use Module\ZoneModule\Repositories\Eloquent\ZoneDistrictRepository;
use Module\ZoneModule\Repositories\Eloquent\ZoneDistrictRepositoryInterface;
use Module\ZoneModule\Repositories\Eloquent\ZoneProvinceRepository;
use Module\ZoneModule\Repositories\Eloquent\ZoneProvinceRepositoryInterface;
use Module\ZoneModule\Repositories\Eloquent\ZoneTownshipRepository;
use Module\ZoneModule\Repositories\Eloquent\ZoneTownshipRepositoryInterface;
use Dnsoft\Acl\Facades\Permission;
use Dnsoft\Core\Events\CoreAdminMenuRegistered;

class ZoneServiceProvider extends BaseModuleServiceProvider
{
    public function getModuleNamespace()
    {
        return 'zone';
    }

    public function registerPermissions()
    {
        Permission::add('zone.admin.province.index', __('zone::permission.province.index'));
        Permission::add('zone.admin.province.create', __('zone::permission.province.create'));
        Permission::add('zone.admin.province.edit', __('zone::permission.province.edit'));
        Permission::add('zone.admin.province.destroy', __('zone::permission.province.destroy'));

        Permission::add('zone.admin.import.index', __('zone::permission.import.index'));
    }

    public function register()
    {
        $this->app->bind(ZoneProvinceRepositoryInterface::class, ZoneProvinceRepository::class);
        $this->app->bind(ZoneDistrictRepositoryInterface::class, ZoneDistrictRepository::class);
        $this->app->bind(ZoneTownshipRepositoryInterface::class, ZoneTownshipRepository::class);

        $this->commands([
            DownloadCommand::class,
            UpdateCommand::class,
        ]);

        require_once __DIR__.'/../helpers/helpers.php';

        $this->registerPermissions();
        $this->registerAdminMenus();
    }

    public function registerAdminMenus()
    {
        Event::listen(CoreAdminMenuRegistered::class, function ($menu) {
            $menu->add(__('zone::menu.zone.index'), ['route' => 'zone.admin.province.index', 'parent' => $menu->system->id])
                ->data('order', 9)->prepend('<i class="fab fa-accusoft"></i>');
        });
    }
}
