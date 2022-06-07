<div>
    <div class="card">
            <div class="card-body ">
                <form class="form-group payment" action="">
                    <input type="hidden" wire:model="channel_id">


                    <div class="form-control">
                        <label for="">Payable Ammount :</label>
                        <input type="hidden" class="form-control" value="1000" readonly  wire:model="amount">
                        <strong style="color: red;">1000 Taka</strong>
                    </div>

                    <div class="form-control">
                        <label for="">Payment Options</label>
                    <select wire:model="payment_type" class="form-control select" id="">
                        <option value="">--Choose--</option>
                        <option value="Bkash">Bkash</option>
                        <option value="Rocket">Rocket</option>
                        <option value="Nogod">Nogod</option>
                    </select>
                </div>
                <div class="form-control">
                    <label for="">Account No</label>
                    <input type="text"   wire:model="account_no">
                </div>
                <div class="form-control">
                    <label for="">Refferal Id</label>
                    <input type="text" class="form-control" wire:model="ref">
                </div>
                <div class="form-control">
                    <label for="">From Date</label>
                    <input type="text" class="form-control" wire:model="from_date">
                </div>
                <div class="form-control">
                    <label for="">Expair date</label>
                    <input type="text" class="form-control" wire:model="to_date">
                </div>

                    <input wire:click.prevent="ChannelPayment" type="submit" class="btn btn-success" value="Confirm">
                </form>
            </div>
    </div>

 </div>
<style>
    .payment input,.select{
        background: rgb(219 219 219);
        color: #000000;
    }
</style>
