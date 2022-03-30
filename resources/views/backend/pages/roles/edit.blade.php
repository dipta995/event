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
                           <form action="{{ route('admin.roles.update',$role->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="basicInput">Role</label>
                                <input value="{{ $role->name }}" type="text" name="name" class="form-control" id="basicInput" placeholder="Enter role">
                            </div>


                            @foreach ($permission_groups as $group)
                                <div class="row">
                                    @php  $i = 1;  @endphp
                                    <div class="col-md-4">
                                        <div class="form-check form-switch">
                                            {{-- <input value="" class="form-check-input" name="" type="checkbox" id="flexSwitchCheckDefault"> --}}
                                            <label class="form-check-label" for="flexSwitchCheckDefault">{{ $group->name }}</label>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        @php
                                        // $permissions = DB::('permissions')->getpermissionsByGroupName($group->name);
                                            $j=1;
                                        @endphp
                                        @foreach ($permissions as $permission)

                                        @if ($permission->group_name == $group->name)
                                            <div class="form-check form-switch">
                                            <input  {{ $role->hasPermissionTo($permission->name)==1 ? 'checked' : '' }}  value="{{ $permission->id }}" class="form-check-input" name="permissions[]" type="checkbox" id="flexSwitchCheckDefault">
                                            <label class="form-check-label" for="flexSwitchCheckDefault">{{ $permission->name }}</label>
                                        </div>

                                        @endif


                                        @php
                                        $j++;
                                    @endphp
                                        @endforeach
                                        <hr>
                                    </div>

                                </div>
                                @php
                                $i++;
                            @endphp
                            @endforeach





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
