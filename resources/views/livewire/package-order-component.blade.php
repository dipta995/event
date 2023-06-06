<div>
    <div class="card" style="width: 1200px;">
        <div style="width: 650px; overflow:auto;" class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Package Title</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Customer Contact</th>
                    <th scope="col">Price</th>
                    <th scope="col">Account no</th>
                    <th scope="col">From date</th>
                    <th scope="col">Ending Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($data as $key => $item)
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $item->package->name }}</td>
                        <td><a href="{{ route('view.user',$item->user_id) }}">{{ $item->user->name }}</a></td>
                        <td>{{ $item->user->phone   }}</td>
                        <td>{{ $item->amount }}</td>
                        <td>{{ $item->account_no }}</td>
                        <td>{{ $item->from_date }}</td>
                        <td>{{ $item->day }}</td>
                        @if ($item->status == 1)
                            <td>Approved</td>
                        @endif
                        @if ($item->status == 2)
                            <td>Rejected</td>
                        @endif
                        <td>
                            @if ($item->status == 0)
                                <a href="#" class=" btn-success"
                                   wire:click.prefetch="approvePAckage({{ $item->id }})">Approve</a>
                                <a href="#" class="btn-danger" wire:click.prefetch="rejectPAckage({{ $item->id }})">Reject</a>
                            @else
                                Ratting : {{ $item->ratting ?? "N/A" }}
                            @endif
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>
