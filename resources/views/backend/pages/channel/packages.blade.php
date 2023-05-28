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
                    Package List
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Package Name</th>
                            <th>discount</th>
                            <th>day</th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($packages as $item)
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->discount }} %</td>
                            <td>{{ $item->day }}</td>
                            <td>
                                @if ( Auth::guard('web')->user()->can('package_order.edit'))
                                    <a class="badge bg-info" href="{{ route('package.orders',$item->id) }}"><i class="fas fa-book"></i></a>
                                @endif
                                @if ( Auth::guard('web')->user()->can('package.delete'))
                                    <a class="badge bg-danger" href="{{route('packages.delete', $item->id)}}"><i class="fas fa-trash"></i></a>
                                @endif
                            </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="6">No Data Found! </td>
                                <td colspan="2"></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        {!! $packages->links() !!}
                    </div>
                </div>    </div>

        </section>
        <!-- Basic Tables end -->
    </div>

@endsection
