<div>

    <form>
        <div class="form-group">
            <label for="exampleInputEmail1">Comment</label>
            <textarea  wire:model="comment" id="" cols="2" rows="5"  class="form-control"></textarea>
        </div>

        <button type="submit" wire:click.prevent="reportChannelPost" class="btn btn-primary">Submit</button>

    </form>
</div>
