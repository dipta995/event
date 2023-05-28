@extends('backend.layouts.master')
@section('title')
    Channels
@endsection

@section('admin-content')


    @include('backend.layouts.partials.page-header', $pageHeader)
    <div class="page-content">
        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Channel List
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Owner</th>
                            <th>Title</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($channels as $item)
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->name }}</td>
                            <td>
                                @if ( Auth::guard('web')->user()->can('package.view'))
                                    <a class="badge bg-info" href="{{ route('packages',$item->user_id) }}"><i class="fas fa-book"></i></a>
                                @endif
                                @if ( Auth::guard('web')->user()->can('channel.delete'))
                                    <a class="badge bg-danger" href="{{route('admin.channels.destroy', $item->id)}}"><i class="fas fa-trash"></i></a>
                                @endif
                            </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="6">No Data Found! </a>
                                </td>
                                <td colspan="2"></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        {!! $channels->links() !!}
                    </div>
                </div>    </div>

        </section>
        <!-- Basic Tables end -->
    </div>

@endsection
