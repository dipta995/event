<div>
    @if (auth()->user()->channel=='yes')
    <div class="card">
        <div class="card-body">
            @error('post_text') <span class=" alert-danger">{{ $message }}</span> @enderror

            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text"  wire:model="name" class="form-control" placeholder="Package name">
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Price</label>
                            <input type="number"  wire:model="price" class="form-control" min="1" step="1" placeholder="Enter price">
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Discount</label>
                            <input type="number"  wire:model="discount" class="form-control" min="0" step="1" placeholder="Enter discount">
                        </div>
                    </div>
                    <div class="col-md-4">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Day</label>
                            <input type="number"  wire:model="day" class="form-control" min="1" step="1" placeholder="Enter discount">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Banner</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input"  wire:model="banner" id="inputGroupFile04">
                                <label class="custom-file-label" for="inputGroupFile04">Choose Banner</label>
                              </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Demo Images</label>
                            <div class="custom-file">
                                <input type="file" multiple  wire:model="images" class="custom-file-input" id="inputGroupFile04">
                                <label class="custom-file-label" for="inputGroupFile04">Choose images</label>
                              </div>
                        </div>
                        <div wire:loading wire:target="images" style="color: green;">Uploading...</div>
                        @if ($images)
                        <div class="row">
                        @foreach ($images as $key=>$image)
                        <div class="col-xs-2">
                            <div class="card-body">
                                <img style="float: left;height: 60px; position: relative;" src="{{ $image->temporaryUrl() }}" alt="Uploading...">
                                <div style="color: red; font-size: 20px; position: absolute;" wire:key="{{$loop->index}}">
                                    <a wire:click="removeMe({{$loop->index}})"><i class="fa fa-trash"></i></a>
                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>
                            @endif
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea  wire:model="description" id="" cols="2" rows="5"  class="form-control"></textarea>
                </div>

                <button type="submit" wire:click.prevent="createpackage" class="btn btn-primary">Submit</button>

            </form>
        </div>
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <div class="row">
                @foreach ($data as $item)
                <div class="col-xs-12 col-sm-6">
                    <div class="card">
                        <a class="img-card" href="">
                        <img src="{{ asset('storage/'.$item->banner)}}" />
                      </a>
                        <div class="card-content">
                            <h4 class="card-title">
                                <a href="{{ url('package/'.$item->slug) }}"> {{ $item->name }}</a>
                            </h4>
                            <p class="">Price : <strong>{{ $item->price }}</strong> </p>
                            <p class="">Discount : <strong>{{ $item->discount }} %</strong> </p>
                            <p class="">Day : <strong>{{ $item->day }} </strong> </p>
                        </div>
                        <div class="card-read-more">
                            <a href="{{ url('package/'.$item->slug) }}" class="btn btn-link btn-block">
                                See more
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<style>
    .form-control{
        border: 1px solid #c0bcbc !important;
                color: #575757;
                font-size: 14px;
                padding: 5px 20px;
                width: 100%;
    }
    @import url(https://fonts.googleapis.com/css?family=Roboto:400,100,900);

html,
body {
  -moz-box-sizing: border-box;
       box-sizing: border-box;
  height: 100%;
  width: 100%;
  background: #FFF;
  font-family: 'Roboto', sans-serif;
  font-weight: 400;
}

.wrapper {
  display: table;
  height: 100%;
  width: 100%;
}

.container-fostrap {
  display: table-cell;
  padding: 1em;
  text-align: center;
  vertical-align: middle;
}
.fostrap-logo {
  width: 100px;
  margin-bottom:15px
}
h1.heading {
  color: #fff;
  font-size: 1.15em;
  font-weight: 900;
  margin: 0 0 0.5em;
  color: #505050;
}
@media (min-width: 450px) {
  h1.heading {
    font-size: 3.55em;
  }
}
@media (min-width: 760px) {
  h1.heading {
    font-size: 3.05em;
  }
}
@media (min-width: 900px) {
  h1.heading {
    font-size: 3.25em;
    margin: 0 0 0.3em;
  }
}
.card {
  display: block;
    margin-bottom: 20px;
    line-height: 1.42857143;
    background-color: #fff;
    border-radius: 2px;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);
    transition: box-shadow .25s;
}
.card:hover {
  box-shadow: 0 8px 17px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
}
.img-card {
  width: 100%;
  height:200px;
  border-top-left-radius:2px;
  border-top-right-radius:2px;
  display:block;
    overflow: hidden;
}
.img-card img{
  width: 100%;
  height: 200px;
  object-fit:cover;
  transition: all .25s ease;
}
.card-content {
  padding:15px;
  text-align:left;
}
.card-title {
  margin-top:0px;
  font-weight: 700;
  font-size: 1.65em;
}
.card-title a {
  color: #000;
  text-decoration: none !important;
}
.card-read-more {
  border-top: 1px solid #D4D4D4;
}
.card-read-more a {
  text-decoration: none !important;
  padding:10px;
  font-weight:600;
  text-transform: uppercase
}
</style>
