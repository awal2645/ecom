@extends('layouts.backend_layouts')
@section('title', 'Social Account ')
@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <h4 class="card-title text-center">Social Accouont Form</h4>
                    </div>
                    <form class="forms-sample" action="{{ route('scocial.account.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Social Accouont Name</label>
                            <input type="text" class="form-control text-white" name="name" id="name"
                                value="{{ old('name') }}" placeholder="Enter your Social Accouont  Name">
                            @error('name')
                                <p class=" text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="link">Social Accouont Link</label>
                            <input type="text" class="form-control text-white" name="link" value="{{ old('link') }}"
                                id="link" placeholder="Enter your Social Accouont Link">
                            @error('link')
                                <p class=" text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="icon_name">Social Accouont Icon</label> <br>
                            <a href="https://fontawesome.com/v4/icons/" class="text-danger">Only use this link icon class
                                name </a>
                            <input type="text" name="icon_name" class="form-control text-white" id="icon_name"
                                placeholder="Example - fa fa-address-book-o">
                            @error('icon_name')
                                <p class=" text-danger" role="alert">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary me-2">Submit</button>
                        <button class="btn btn-dark">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-8">
                        <h4 class="card-title">Social Account List</h4>
                    </div>
                    {{-- <div class="col-4"> <a href="{{route('category.add')}}" class="btn btn-success">Category <i class="mdi mdi-plus-circle"></i></a></div> --}}
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Link</th>
                                <th>Icon</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($socialAccouonts as $key => $socialAccouont)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td> {{ $socialAccouont->name }}</td>
                                    <td> {{ $socialAccouont->link }}</td>
                                    <td> <i class="{{ $socialAccouont->icon_name }}"></i> {{ $socialAccouont->icon_name }}
                                    </td>
                                    <td>
                                        <a class="btn btn-success"
                                            href="{{ route('scocial.account.edit', $socialAccouont->id) }}"><i
                                                class="mdi mdi-lead-pencil"></i></a>
                                        <a class="btn btn-danger"
                                            href="{{ route('scocial.account.delete', $socialAccouont->id) }}"><i
                                                class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   
@endsection
