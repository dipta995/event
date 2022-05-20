<div>
    <div class="card-body">
        <div class="card-header">
           <div>
            <figure>
                <img src="{{ asset('storage/'.$package->banner)}}">
            </figure>
               <h3>{{ $channelinfo->name }}</h3>
            </div>
            <h4>{{ $package->name }}</h4>
            <p>{{ $package->description }}</p>
        </div>
        <div class="card-body row">
            <div class="col-md-6">
                @php
                $packimage = json_decode($package['images'], true);
                @endphp
                @foreach($packimage as $key=>$image)

                    <img src="{{ asset('storage/'.$image)}}">



                @endforeach
            </div>
        </div>
    </div>
</div>
