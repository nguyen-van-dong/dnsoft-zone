<?php

namespace Modules\ZoneModule;

use Dnsoft\Core\Support\BaseModuleServiceProvider;
use Illuminate\Support\Facades\Event;
use Modules\ZoneModule\Console\Commands\DownloadCommand;
use Modules\ZoneModule\Console\Commands\UpdateCommand;
use Modules\ZoneModule\Repositories\Eloquent\ZoneDistrictRepository;
use Modules\ZoneModule\Repositories\Eloquent\ZoneDistrictRepositoryInterface;
use Modules\ZoneModule\Repositories\Eloquent\ZoneProvinceRepository;
use Modules\ZoneModule\Repositories\Eloquent\ZoneProvinceRepositoryInterface;
use Modules\ZoneModule\Repositories\Eloquent\ZoneTownshipRepository;
use Modules\ZoneModule\Repositories\Eloquent\ZoneTownshipRepositoryInterface;
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
    }

    public function registerAdminMenus()
    {
        Event::listen(CoreAdminMenuRegistered::class, function ($menu) {
//            AdminMenu::addItem(__('zone::menu.zone.index'), [
//                'id'         => 'zone_root',
//                'parent'     => 'system_root',
//                'route'      => 'zone.admin.province.index',
//                'permission' => 'zone.admin.province.index',
//                'icon'       => 'typcn typcn-sort-numerically-outline',
//                'order'      => 7,
//            ]);
        });
    }
}
