@extends('backend.layouts.master')

@section('content')

<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <i class="fa fa-th-list"></i> List Contacts
            </h1>
            <p>Display all lists contacts</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">admin</li>
            <li class="breadcrumb-item active"><a href="#">contact</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div id="sampleTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                        <div class="row">
                            <div class="col-sm-12 col-md-12">
                                <div id="sampleTable_filter" class="dataTables_filter">
                                    @include('backend.layouts.search', ['route' => route('contact.index')])
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-hover table-bordered dataTable no-footer" id="sampleTable" role="grid" aria-describedby="sampleTable_info">
                                    <thead>
                                        <tr role="row">
                                            <th tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 10px;">#</th>
                                            <th tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 150px;">Title</th>
                                            <th tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 150px;">Name</th>
                                            <th tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 150px;">Email</th>
                                            <th tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 150px;">Phone</th>
                                            <th tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 150px;">Content</th>
                                            <th tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 50px;">Status</th>
                                            <th tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 50px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($contacts as $key => $contact)
                                        <tr role="row" class="odd">
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $contact->title }}</td>
                                            <td>{{ $contact->fullname }}</td>
                                            <td>{{ $contact->phone }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ str_limit($contact["content"], 50) }}</td>
                                            <td class = "btn-changstatus-{{$contact->id}}">
                                                <button
                                                    class="btn btn-{{$contact->status == 1 ? 'warning' : 'success'}}"
                                                >
                                                    {{$contact->status == 1 ? 'Read' : 'Unread '}}
                                                </button>
                                            </td>

                                            <td>
                                                <a href="backend/contacts/index/{{ $contact->id }}"  onclick="changeStatus({{$contact->id}})" class="btn btn-info" data-toggle="modal" data-target="#myModa{{ $contact->id }}">
                                                    <i class="fa fa-info-circle" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @include('backend.contacts.detail')
                                        @endforeach
                                    </tbody>
                                </table>
                                <div style="float: right;">
                                    {{ $contacts->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('script')
<script type="text/javascript">
    function changeStatus(id) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'POST',
            dataType: 'json',
            url: "{{route('contact.changestatus')}}",
            data: {
                'id': id
            },
            success: function(data) {
                console.log(data.status)
                var	button = "";
                if (data.status) {
                    button = "<button class='btn btn-warning'> Read </button>";
                } else {
                    button = "<button class='btn btn-success'> Unread </button>";
                }
                $('.btn-changstatus-' + data.id).empty();
                $('.btn-changstatus-' + data.id).append(button);

            },
        });
    }
</script>
@endpush



