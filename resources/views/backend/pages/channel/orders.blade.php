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
                    Order List
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Customer name</th>
                            <th>payment type</th>
                            <th>amount</th>
                            <th>account no</th>
                            <th>from date</th>
                            <th>day</th>
                            <th>Status</th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($orders as $item)
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->payment_type }}</td>
                            <td>{{ $item->amount }} Taka</td>
                            <td>{{ $item->account_no }}</td>
                            <td>{{ $item->from_date }}</td>
                            <td>{{ $item->day }}</td>
                            <td><a class="btn-dark">{{ $item->status==0 ? "Pending" : "Active" }}</a></td>
                            <td>
                                @if ( Auth::guard('web')->user()->can('channel.delete'))
                                    <a class="badge bg-danger" href="{{route('packages.order.delete', $item->id)}}"><i class="fas fa-trash"></i></a>
                                @endif
                            </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2"></td>
                                <td colspan="6">No Data Found!
                                </td>
                                <td colspan="2"></td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        {!! $orders->links() !!}
                    </div>
                </div>    </div>

        </section>
        <!-- Basic Tables end -->
    </div>

@endsection
