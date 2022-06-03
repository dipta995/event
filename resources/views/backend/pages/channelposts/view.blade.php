@extends('backend.layouts.master')
@section('title')
    Users
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
          <table>
              <tr>
                  <td><strong>Channel Name :</strong> {{ $post->channel->name }} </td>
                  <td><strong>Tags :</strong> {{ $post->tags }} </td>
                  <td><strong>Created At :</strong> {{ $post->created_at }} </td>
              </tr>

          </table>
        </div>
        <div class="card-body">
            <p>{{ $post->post_text }}</p>
        </div>
        <hr>
        <div class="row">
            @php

                $post = json_decode($post->postimage['image'], true);
            @endphp
            @foreach ($post as $image)

            <div class="col-md-6">
            <img style="height: 200px;" src="{{ asset('storage/'.$image)}}">
            </div>
            @endforeach
        </div>
    </div>

</section>
<!-- Basic Tables end -->
    </div>

@endsection
