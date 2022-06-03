@extends('backend.layouts.master')
@section('title')
    Rols
@endsection

@section('admin-content')


<div class="row">
    <div class="col-12 col-md-6 order-md-1 order-last">
        <h3>DataTable Jquery</h3>
        <p class="text-subtitle text-muted">For user to check they list</p>
    </div>
    <div class="col-12 col-md-6 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">DataTable Jquery</li>
            </ol>
        </nav>
    </div>
</div>
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Basic Inputs</h4>
                </div>


                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                           <form action="{{ route('admin.users.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="basicInput">Name</label>
                                <input type="text" name="name" class="form-control" id="basicInput" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label for="basicInput">Email</label>
                                <input type="email" name="email" class="form-control" id="basicInput" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label for="basicInput">Password</label>
                                <input type="text" name="password" class="form-control" id="basicInput" placeholder="Enter Password">
                            </div>
                            <div class="form-group">
                                <label for="basicInput">Confirm Password</label>
                                <input type="text" name="password_confirmation" class="form-control" id="basicInput" placeholder="Enter Confirm Password">
                            </div>


                            <div class="form-group">
                                <select name="roles[]" class="choices form-select multiple-remove" multiple="multiple">

                                        @foreach ($roles as $role)

                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                        @endforeach



                                </select>
                            </div>


                              {{-- <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox
                                    input</label>
                            </div> --}}

                                <button type="submit" class="btn btn-outline-success">With Buttons</button>
                           </form>

                        </div>

                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection
