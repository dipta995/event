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
          <tr>
              @foreach ($data as $key=>$item)
            <th scope="row">{{ $key+1 }}</th>
            <td>{{ $item->package->name }}</td>
            <td>{{ $item->amount }}</td>
            <td>{{ $item->account_no }}</td>
            <td>{{ $item->from_date }}</td>
            <td>{{ $item->day }}</td>
                  <td>
                      @php
                          $date = \Carbon::parse($item->from_date);
                          $fourDaysLater = $date->addDays($item->day);
                      @endphp
                      @if (date('Y-m-d') > $fourDaysLater)
                              <a href="{{ url('package/ratting',$item->id) }}">Ratting </a>
                      @else
                          @if ($item->status == 1)
                              <a href="{{ url('package/ratting',$item->id) }}">Ratting </a>
                          @elseif($item->status == 2)
                              <a href="#">Rejected </a>
                          @else
                              <a href="#">Pending </a>
                          @endif
                      @endif
                  </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
