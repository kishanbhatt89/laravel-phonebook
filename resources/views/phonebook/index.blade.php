@extends('layouts.master')

@section('content')

    {{-- Main Page Content Start --}}
        <div class="page-header row no-gutters py-4">
            <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Phonebok</span>
            </div>
        </div>


       <div class="row">
            <div class="col">
                <div class="card mb-4">
                    <div class="card-header border-bottom">
                        <h6 class="m-0">Contact List
                            <a class="ml-3 btn btn-md btn-primary" href="{{ route('phonebook.pdf') }}"><i class="material-icons">picture_as_pdf</i> Export as PDF</a>
                            <a class="float-right btn btn-md btn-primary" href="{{ route('phonebook.create') }}"><i class="material-icons">add</i> Add Contact</a>
                        </h6>
                    </div>
                    <div class="card-body p-0 pb-1 text-center">
                        <table class="table table table-striped">
                            <thead class="bg-light">
                                <tr>
                                    <th>#</th>
                                    <th>Contact Name</th>
                                    <th>Contact Image</th>
                                    <th>Phone No</th>
                                    <th>Notes</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($contacts as $contact)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>
                                            <img src="{{ asset('uploads/avatars/'.$contact->avatar) }}" alt="No Image" width="50px" height="50px">
                                        </td>
                                        <td>{{ $contact->contactno }}</td>
                                        <td>{{ $contact->notes }}</td>
                                        <td style="font-size:16px;">
                                            <a href="{{ route('phonebook.edit',$contact->id) }}" class="btn btn-sm btn-warning">Edit</a>

                                            <button class="btn btn-sm btn-danger" onclick="deleteMe({{ $contact->id }});">Delete</button>

                                            <form id="deleteContact_{{ $contact->id }}" method="post" action="{{ route('phonebook.destroy',$contact->id) }}" style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">No Contacts Found.</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer text-center pt-0 pb-0">
                        {{ $contacts->links() }}
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Contact Delete Confirmation.</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h5>Are you sure you want to delete this CONTACT ?</h5>
                    </div>
                    <div class="modal-footer text-center">
                        <button type="button" class="btn btn-danger setVal">Delete</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    {{-- Main Page Content End --}}


@endsection

@section('customScripts')
    <script>
        function deleteMe(id){

            $("#confirmDelete").addClass("in");
            $("#confirmDelete").modal();

            $('.setVal').attr('id',id);

            $('.setVal').on('click',function(e){
                e.preventDefault();
                $('#deleteContact_'+id).submit()
            });
        }
    </script>
@endsection
