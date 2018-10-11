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
                        <h6 class="m-0">Create Contact</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('phonebook.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control @if($errors->has('name')) is-invalid @endif" name="name" placeholder="Enter Name">
                                    @if ($errors->has('name'))
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="contactno">Contact No</label>
                                    <input type="text" class="form-control @if($errors->has('contactno')) is-invalid @endif" name="contactno" placeholder="Enter Contact No">
                                    @if ($errors->has('contactno'))
                                        <p class="text-danger">{{ $errors->first('contactno') }}</p>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="notes">Notes</label>
                                    <textarea name="notes" cols="5" rows="5" placeholder="Enter Notes" class="form-control @if($errors->has('notes')) is-invalid @endif"></textarea>
                                    @if ($errors->has('notes'))
                                        <p class="text-danger">{{ $errors->first('notes') }}</p>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="avatar">Picture</label>
                                    <input type="file" name="avatar" class="form-control @if($errors->has('avatar')) is-invalid @endif">
                                    @if ($errors->has('avatar'))
                                        <p class="text-danger">{{ $errors->first('avatar') }}</p>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    {{-- Main Page Content End --}}

@endsection
