<div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Package Title</th>
                <th scope="col">Price</th>
                <th scope="col">Account no</th>
                <th scope="col">From date</th>
                <th scope="col">Ending Date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $item)
            <tr>
                    <th scope="row">{{ $key+1 }}</th>
                    <td>{{ $item->package->name }}</td>
                    <td>{{ $item->amount }}</td>
                    <td>{{ $item->account_no }}</td>
                    <td>{{ $item->from_date }}</td>
                    <td>{{ $item->day }}</td>
                    <td>
                        <a href="{{ url('package', $item->package->slug) }}">View Package </a>
                    </td>
                </tr>
                @endforeach

        </tbody>
    </table>
</div>
