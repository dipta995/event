@extends('backend.layouts.master')
@section('title')
    Rols
@endsection

@section('admin-content')

    @include('backend.layouts.partials.page-header', $pageHeader)
    <div class="page-content">
        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Report Table
                </div>
                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Channel name</th>
                            <th>Author</th>
                            <th>Dates</th>
                            <th>Amount</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($payments as $item)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $item->channel->name }}</td>
                                <td>{{ $item->channel->user->name }}</td>
                                <td>{{ $item->from_date }} - {{ $item->to_date }}</td>
                                <td>{{ $item->amount }} Tk</td>
                                <td>
                                    @if ( Auth::guard('web')->user()->can('report.edit'))

                                        <a class="badge bg-info"
                                           href="{{ route('admin.channel.payments.edit',$item->id) }}"><i
                                                class="fas fa-edit"></i></a>
                                    @endif
                                    @if ( Auth::guard('web')->user()->can('report.delete'))
                                        <a class="badge bg-danger"
                                           href="{{route('admin.channel.payments.destroy', $item->id)}}"><i
                                                class="fas fa-trash"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        {!! $payments->links() !!}

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
