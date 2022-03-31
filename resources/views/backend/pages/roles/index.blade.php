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
  <!-- Basic Tables start -->
  <section class="section">
    <div class="card">
        <div class="card-header">
            Jquery Datatable
        </div>
        <div class="card-body">
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Permissions</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($roles as $role)
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                @foreach ($role->permissions as $item)
                                <span class="badge bg-success">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @if ( Auth::guard('web')->user()->can('role.edit'))
                                <a class="badge bg-info" href="{{ route('admin.roles.edit',$role->id) }}">Edit</a>
                                @endif
                                @if ( Auth::guard('web')->user()->can('role.delete'))
                                <a class="badge bg-danger" href="">Delete</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach







                </tbody>
            </table>
        </div>
    </div>

</section>
<!-- Basic Tables end -->
    </div>

@endsection
