<div>
<div class="card">
    <div class="card-body">
    <form>
        <div class="form-group">
            <label for="exampleInputEmail1" style="color: black;">Comment</label>
            <textarea style="border: 1px solid black;"  wire:model="comment" id="" cols="2" rows="5"  class="form-control"></textarea>
        </div>

        <button type="submit" wire:click.prevent="reportChannelPost" class="btn btn-primary">Submit</button>

    </form>
    </div>
</div>
</div>
