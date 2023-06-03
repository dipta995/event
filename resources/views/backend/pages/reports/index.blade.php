@extends('backend.layouts.master')
@section('title')
    Report
@endsection
@section('admin-content')
    @include('backend.layouts.partials.page-header', $pageHeader)
    <div class="page-content">
        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Post Report's
                </div>
                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Post Text</th>
                            <th>Report By</th>
                            <th>Comment</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($reports as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>
                                    <div class="long-text">
                                        <p>{{ $item->post->post_text }}</p>
                                        <a href="#" class="read-more">Read </a>
                                    </div>
                                </td>
                                <td>{{ $item->users->name }}</td>
                                <td>{{ $item->comment }}</td>
                                <td>
                                    <a class="badge bg-info" href="{{ route('post-details',$item->post->slug) }}"><i
                                            class="fas fa-eye"></i></a>
                                    @if ( Auth::guard('web')->user()->can('report.view'))
                                        @if ($item->post->status == 'published')
                                            <a class="badge bg-dark" href="{{ route('admin.reports.edit',[$item->post_id,'status=draft']) }}"><i
                                                    class="fas fa-lock"></i></a>
                                        @else
                                            <a class="badge bg-info" href="{{ route('admin.reports.edit',[$item->post_id,'status=published']) }}"><i
                                                    class="fas fa-unlock"></i></a>
                                        @endif
                                    @endif
                                    @if ( Auth::guard('web')->user()->can('report.delete'))
                                        <a class="badge bg-danger" href="{{route('admin.reports.destroy', $item->id)}}"><i
                                                class="fas fa-trash"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        {!! $reports->links() !!}
                        </tbody>
                    </table>
                </div>
            </div>
            <style>
                .long-text p {
                    display: none;
                }

                .read-more {
                    display: inline-block;
                    margin-top: 10px;
                    background-color: #f1f1f1;
                    padding: 10px;
                    border-radius: 5px;
                    text-decoration: none;
                    color: #333;
                }

            </style>
            <script src="{{ asset('backend/assets/vendors/jquery/jquery.min.js') }}"></script>
            <script>
                $('.read-more').click(function (e) {
                    e.preventDefault();
                    $(this).prev('p').toggle();
                    $(this).text($(this).text() == 'Read ' ? 'Hide' : 'Read');
                });
            </script>
        </section>
        <!-- Basic Tables end -->
    </div>
@endsection
