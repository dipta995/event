<div class="card">
    <div class="card-body ">
        <form class="form-group payment" action="">
        <input type="text" wire:model="order_id">
        <div class="form-control">
            <select class="from-controll select" wire:model="ratting" id="">
                <option value="5">5</option>
                <option value="4">4</option>
                <option value="3">3</option>
                <option value="2">2</option>
                <option value="1">1</option>
            </select>
            @error('ratting')
            <span class="error">{{ $message }}</span>
        @enderror
        </div>
        <div class="form-control">
            <textarea wire:model="comment" id="" class="form-control" cols="10" rows="2"></textarea>
            @error('comment')
            <span class="error">{{ $message }}</span>
        @enderror
        </div>
        <div class="form-control">

            <button type="submit" wire:click.prevent="rattingConfirm">Confirm</button>
        </div>
    </form>
</div>
</div>
<style>
    .payment input,.select{
        background: rgb(219 219 219);
        color: #000000;
    }
</style>
