<div>
    <form>
        <input type="hidden" wire:model="postId" value="{{ $postId }}">
        <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <textarea  wire:model="post_text" id="" cols="2" rows="5"  class="form-control"></textarea>
        </div>

        <button type="submit"  wire:click.prevent="updatePost" class="btn btn-primary">Update</button>

    </form></div>
