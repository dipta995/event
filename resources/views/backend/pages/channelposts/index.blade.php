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
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Channel Name</th>
                        <th>Owner Name</th>
                        <th>Info</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($channelPost as $post)
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $post->channel->name }}</td>
                            <td>{{ $post->channel->user->name }}</td>
                            <td>
                                {{ $post->channel->user->phone }} <br><hr>
                                {{ $post->channel->user->address }}
                            </td>
                            <td>
                                @if($post->status=='published')
                                <span class='badge rounded-pill bg-success'>Published</span>
                                @else
                                <span class='badge rounded-pill bg-danger'>Unpublished</span>
                                @endif
                            </td>


                            <td>
                                @if ( Auth::guard('web')->user()->can('channel_post.edit'))
                                <a class="badge bg-info" href="{{ route('admin.channel.posts.show',$post->id) }}">View</a>
                                <a class="badge bg-success" href="{{ route('admin.channel.posts.edit',$post->id) }}?status={{ $post->status }}">{{ $post->status=='draft' ? 'Publish' : 'Unpublish' }}</a>
                                @endif
                                @if ( Auth::guard('web')->user()->can('channel_post.delete'))
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
