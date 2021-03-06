<?php

namespace App\Http\Controllers\V1\Web\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\V1\Contact\ContactRepositoryInterFace;
use App\Repositories\V1\Introduce\IntroduceRepositoryInterface;
use App\Http\Requests\Contacts\CreateContactRequest;
use App\Models\Contact;
use Illuminate\Support\Collection;
use App\Repositories\V1\Facilitie\FacilitieRepositoryInterface;
use App\Repositories\V1\Cuisine\CuisineRepositoryInterface;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $repoContact;
    protected $repoIntroduce;
    protected $repoFacilitie;
    protected $repoCuisine;

    public function __construct(
        ContactRepositoryInterFace $repositoryContact,
        IntroduceRepositoryInterface $repoIntroduce,
        FacilitieRepositoryInterface $repoFacilitie,
        CuisineRepositoryInterface $repoCuisine
    ) {
        $this->repoIntroduce = $repoIntroduce;
        $this->repoContact = $repositoryContact;
        $this->repoFacilitie = $repoFacilitie;
        $this->repoCuisine = $repoCuisine;
    }

    public function index()
    {
        $introduces = $this->repoIntroduce->indexTop(3);
        $facilities = $this->repoFacilitie->index();
        $cuisines = $this->repoCuisine->index();

        return view('frontend.contacts.index', compact('introduces', 'facilities', 'cuisines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateContactRequest $request)
    {
        $this->repoContact->store($request->all());

        return redirect()->route('fe.contact.index')->with('msg', 'Send contact successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditContactRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //
    }

    public function changestatus(Request $request)
    {
        $data = $request->all();

        return $this->repoContact->changestatus($data);
    }
}
