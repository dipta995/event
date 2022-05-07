@extends('backend.layouts.master')
@section('title')
    Category List
@endsection

@section('admin-content')


@include('backend.layouts.partials.page-header', $pageHeader)
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
                        <th>Title</th>

                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>

                        @foreach ($category as $item)
                            <td>{{ $loop->index+1 }}</td>
                            <td>{{ $item->category_name }}</td>


                            <td>
                                @if ( Auth::guard('web')->user()->can('category.edit'))
                                <a class="badge bg-info" href="{{ route('admin.category.edit',$item->id) }}"><i class="fas fa-edit"></i></a>
                                @endif
                                @if ( Auth::guard('web')->user()->can('category.delete'))
                                <a class="badge bg-danger" href="{{route('category.destroy', $item->id)}}"><i class="fas fa-trash"></i></a>
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
