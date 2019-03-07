@extends('backend.layouts.master')

@section('content')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="fa fa-home"></i> Home
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item">
                <i class="fa fa-home fa-lg"></i>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('home.index')}}">Home</a>
            </li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">
                    <a href="{{route('contact.index')}}">Contact</a>
                </h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Full Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($contacts as $key => $contact)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ str_limit($contact["title"], 50) }}</td>
                            <td>{{ $contact->fullname }}</td>
                            <td>{{ $contact->email }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">
                    <a href="{{route('offer.index')}}">Offer</a>
                </h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Content</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($offers as $key => $offer)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $offer->name }}</td>
                            <td>{{ str_limit($offer["content"], 50) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection
