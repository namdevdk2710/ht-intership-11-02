<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\V1\About\AboutRepositoryInterface;
use App\Repositories\V1\Room\RoomRepositoryInterface;

class MenuComposer
{
    public $repoAbout;
    public $repoRoom;
    /**
     * Create a movie composer.
    *
    * @return void
    */
    public function __construct(
        RoomRepositoryInterface $repoRoom,
        AboutRepositoryInterface $repoAbout
    ) {
        $this->repoAbout = $repoAbout;
        $this->repoRoom = $repoRoom;
    }

    /**
     * Bind data to the view.
    *
    * @param  View  $view
    * @return void
    */
    public function compose(View $view)
    {
        $about = $this->repoAbout->index();
        $rooms = $this->repoRoom->index();
        $view->with('about', $about)
            ->with('rooms', $rooms);
    }
}
