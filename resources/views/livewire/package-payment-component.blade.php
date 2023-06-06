<div>
    <style>
        .error{
            color: red;
        }
    </style>
    <div class="card">
            <div class="card-body ">
                @if (session()->has('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form class="form-group payment" action="">
                   <div class="form-control">
                       <input type="hidden" wire:model="package_id">
                        <label for="">Payable Ammount :</label>
                        <input type="hidden" class="form-control"  readonly  wire:model="amount">
                        <strong style="color: red;">{{ $data->price-(($data->price*$data->discount)/100) }} Taka</strong>
                    </div>

                    <div class="form-control">
                        <label for="">Payment Options</label>
                    <select wire:model="payment_type" class="form-control select" id="">
                        <option value="">--Choose--</option>
                        <option value="Bkash">Bkash</option>
                        <option value="Rocket">Rocket</option>
                        <option value="Nogod">Nogod</option>
                    </select>
                        @error('payment_type')
                        <span class="error">{{ $message }}</span>
                        @enderror
                </div>
                <div class="form-control">
                    <label for="">Account No</label>
                    <input type="text"   wire:model="account_no">
                    @error('account_no')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <label for="">Refferal Id</label>
                    <input type="text" class="form-control" wire:model="ref">
                    @error('ref')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <label for="">From Date</label>
                    <input type="date" class="form-control" wire:model="from_date">
                    @error('from_date')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-control">
                    <label for="">Day</label>
                    <input type="text" readonly class="form-control" wire:model="day">
                    @error('day')
                    <span class="error">{{ $message }}</span>
                    @enderror
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
