<div>
    <form>
        <input type="hidden" wire:model="postId" value="{{ $postId }}">
        <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <textarea  wire:model="post_text" id="" cols="2" rows="5"  class="form-control"></textarea>
            <div class="attachments">
                <ul>

                    <li>
                        <i class="fa fa-image"></i>
                        <label class="fileContainer">
                            <input wire:model="images" multiple type="file">
                        </label>
                    </li>

                    @if (auth()->user()->channelSingle->status==1)

{{--                        <li>--}}
{{--                            <button type="submit">Post</button>--}}
{{--                        </li>--}}
                    @else
                        <li>
                            <p>Before Post Please Pay....</p>
                            <a class="btn btn-info" href="{{ url('channel/payment',Auth::user()->id) }}">Pay 1000 Taka</a>
                        </li>
                    @endif
                </ul>
            </div>
    </form>
    <div wire:loading wire:target="images" style="color: green;">Uploading...</div>
    @error('post_text') <span class=" alert-danger">{{ $message }}</span> @enderror
    @if ($images)
        <div class="row">
            @foreach ($images as $key=>$image)
                <div class="col-md-2">
                    <div class="card" style="width: 120px;">
                        <div class="card-body">
                            <img style="float: left;height: 60px;width: 60px;" class="card-img-top" src="{{ $image->temporaryUrl() }}" alt="Uploading...">
                            <div style="margin-left: -53px;
                    color: red;
                    font-size: 25px;" wire:key="{{$loop->index}}">
                                <a wire:click="removeMe({{$loop->index}})"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif


        <button type="submit"  wire:click.prevent="updatePost" class="btn btn-primary">Update</button>

    </form>

    @if ($images_all)
        <div class="row">
            @foreach (\GuzzleHttp\json_decode($images_all) as $key=>$image)
                @include('livewire.remove-post-image', ['image' => $image,'imageId' => $imageId])

            @endforeach
        </div>
    @endif
</div>
