<div>
    <div class="col-md-2">
        <div class="card" style="width: 120px;">
            <div class="card-body">
                <img style="float: left;height: 60px;width: 60px;" class="card-img-top" src="{{ asset('storage/'.$image)}}" alt="Uploading...">
                <div style="margin-left: -53px;
                    color: red;
                    font-size: 25px;" >
                    <a href="{{ route('removepostImage',['image='.$image,'id='.$imageId]) }}" ><i class="fa fa-trash"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
