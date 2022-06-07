<div>
    <div class="card-body">
        <div class="card-header">
           <div>
            <figure>
                <img src="{{ asset('storage/'.$package->banner)}}">
            </figure>
               <h3 style="color:#000; margin: 50px;">{{ $channelinfo->name }}</h3>
               <a class="btn btn-success" href="{{ url('package/payment',$package->id) }}">Pay</a>
            </div>
          <div class="row">
              <div class="col-md-6">
                <div style="color: #000; margin: 50px;">
                    <h4>{{ $package->name }}</h4>
                    <p>{{ $package->description }}</p>
                   </div>
              </div>
              <div class="col-md-6 row">
                  @foreach ($package->packageorder as $order)
                <div class="col-md-12">
                    @for ($i = 0; $i < $order->ratting; $i++)
                    <span class="fa fa-star checked"></span>
                    @endfor
                <br>
                    <p><strong>Comment: </strong>{{ $order->comment }}</p>
                </div>
                  @endforeach
              </div>
          </div>
        </div>
        <div class="card-body row">
            @php
                $packimage = json_decode($package['images'], true);
                @endphp
                @foreach($packimage as $key=>$image)
                <div class="col-md-6">

                    <img src="{{ asset('storage/'.$image)}}">
                </div>



                @endforeach
        </div>
    </div>
</div>
