@extends('backend.layouts.master')
@section('title')
    Create Category
@endsection

@section('admin-content')


@include('backend.layouts.partials.page-header', $pageHeader)
    <div class="page-content">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Basic Inputs</h4>
                </div>


                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                           <form action="{{ route('admin.category.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="basicInput">Category Name</label>
                                <input type="text" name="category_name" class="form-control" id="basicInput" placeholder="Enter name">
                            </div>

                                <button type="submit" class="btn btn-outline-success">Create</button>
                           </form>

                        </div>

                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection
