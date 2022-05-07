<div>
    <div class="central-meta">
        @if (auth()->user()->channel=='yes')

        <div class="new-postbox">
        <figure>
            <img src="{{ asset('storage/'.$mychannel->image)}}">
        </figure>
        <div class="newpst-input">

            <form wire:submit.prevent="addpost({{ $mychannel->id }})">

                <textarea wire:model="post_text" rows="2" placeholder="write something"></textarea>
                <div class="attachments">
                    <ul>
                        {{-- <li>
                            <i class="fa fa-music"></i>
                            <label class="fileContainer">
                                <input type="file">
                            </label>
                        </li> --}}
                        <li>
                            <i class="fa fa-image"></i>
                            <label class="fileContainer">
                                <input wire:model="images" multiple type="file">
                            </label>
                        </li>
                        {{-- <li>
                            <i class="fa fa-video-camera"></i>
                            <label class="fileContainer">
                                <input type="file">
                            </label>
                        </li> --}}
                        {{-- <li>
                            <i class="fa fa-camera"></i>
                            <label class="fileContainer">
                                <input type="file">
                            </label>
                        </li> --}}
                        <li>
                            <button type="submit">Post</button>
                        </li>
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


        </div>
    </div>
    @endif
</div>
</div>
