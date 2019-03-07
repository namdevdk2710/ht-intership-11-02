<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\V1\Introduce\IntroduceRepositoryInterface;

class FooterComposer
{
    public $repoIntroduce;
    /**
     * Create a movie composer.
    *
    * @return void
    */
    public function __construct(IntroduceRepositoryInterface $repoIntroduce)
    {
        $this->repoIntroduce = $repoIntroduce;
    }

    /**
     * Bind data to the view.
    *
    * @param  View  $view
    * @return void
    */
    public function compose(View $view)
    {
        $introduces = $this->repoIntroduce->indexTop(2);

        $view->with('introducesAll', $introduces);
    }
}
