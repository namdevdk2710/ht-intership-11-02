<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\V1\Module\ModuleRepositoryInterface;

class BreadcrumbComposer
{
    public $repoModule;
    /**
     * Create a movie composer.
    *
    * @return void
    */
    public function __construct(ModuleRepositoryInterface $repoModule)
    {
        $this->repoModule = $repoModule;
    }

    /**
     * Bind data to the view.
    *
    * @param  View  $view
    * @return void
    */
    public function compose(View $view)
    {
        $modules = $this->repoModule->breadCrumb();

        $view->with('cpsModules', $modules);
    }
}
