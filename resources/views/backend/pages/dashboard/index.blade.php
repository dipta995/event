@extends('backend.layouts.master')
@section('title')
    Dashboard Page - Admin Panel
@endsection

@section('admin-content')


    <div class="page-heading">
        <h3>Welcome <span style="color: #00a5bb">{{ auth()->user()->name }}</span></h3>
    </div>
    <div class="page-content">
       <div style="height: 400px;"></div>
    </div>

@endsection
