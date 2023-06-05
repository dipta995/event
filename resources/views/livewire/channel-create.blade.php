<div>
    <style>
        .g-map::before {
            background-color: #fff0;
        }

    </style>
    <section style="height:150px;">
        <div class="gap no-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="g-map">

                        </div>
                    </div>
                </div>
            </div>
    </section>
    <section>
        <div class="gap no-top overlap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="contct-info">
                            <div class="container">
                                <br>
                                <h3>Create A New Channel</h3>
                                <form enctype="multipart/form-data">
                                    {{-- @livewire('dropdowns') --}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <select wire:model="selectedDivision" class="form-control">
                                                    <option value="" selected>Choose state</option>
                                                    @foreach ($divisions as $division)
                                                        <option value="{{ $division->id }}">{{ $division->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('selectedDivision')
                                                <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">

                                            @if (!is_null($selectedDivision))

                                                <div class="form-group">
                                                    <select class="form-control" wire:model="district"
                                                            name="district_id">
                                                        <option value="" selected>Choose district</option>
                                                        @foreach ($districts as $district)
                                                            <option value="{{ $district->id }}">
                                                                {{ $district->name }}</option>
                                                        @endforeach
                                                    </select>

                                                </div>

                                            @endif
                                            @error('district_id')
                                            <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-2"></div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input wire:model="name" type="text" id="input" required="required"/>
                                                <label class="control-label" for="input">Business Channel
                                                    Name</label><i class="mtrl-select"></i>
                                                @error('name')
                                                <span class="error">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" id="input" wire:model="phone" required="required"/>
                                                <label class="control-label" for="input">Phone No.</label><i
                                                    class="mtrl-select"></i>
                                            </div>
                                            @error('phone')
                                            <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-3 ">
                                                <input class="form-control" type="file" wire:model="images"
                                                       id="formFile">
                                            </div>
                                            @error('images')
                                            <span class="error">{{ $message }}</span>
                                            @enderror

                                        </div>

                                        <!-- <input type="file" wire:model="images"> -->

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea style="height: 70px;" wire:model="address" rows="4"
                                                          id="textarea" required="required"></textarea>
                                                <label class="control-label" for="textarea">Office Address</label><i
                                                    class="mtrl-select"></i>
                                            </div>
                                            @error('address')
                                            <span class="error">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="submit-btns">
                                            <button wire:click.prevent="createchannel" type="submit"><i
                                                    class="fa fa-plus"></i></button>
                                        </div>
                                </form>
                                <style>
                                    .submit-btns button {
                                        padding: 12px 30px !important;
                                        margin: 21px 68px !important;
                                        float: right !important;
                                    }

                                    .error {
                                        color: red;
                                    }

                                </style>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
