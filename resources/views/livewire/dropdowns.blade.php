<div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                        <select wire:model="selectedDivision" class="form-control">
                            <option value="" selected>Choose state</option>
                            @foreach($divisions as $division)
                                <option value="{{ $division->id }}">{{ $division->name }}</option>
                            @endforeach
                        </select>

                </div>
        </div>
        <div class="col-md-6">

            @if (!is_null($selectedDivision))


            <div class="form-group">
                <select class="form-control" wire:model="district" name="district_id">
                    <option value="" selected>Choose district</option>
                    @foreach($districts as $district)
                        <option value="{{ $district->id }}">{{ $district->name }}</option>
                    @endforeach
                </select>
            </div>

                 @endif
        </div>
    </div>


    


</div>
