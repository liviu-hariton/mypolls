<div>
    <h2>New poll</h2>

    <form wire:submit.prevent="createPoll">
        <div class="mb-3">
            <label class="form-label" for="title">New Poll title</label>
            <input type="text" name="title" id="title" class="form-control" wire:model.live="title">

            @error('title')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="col-12 mb-5">
            <button type="button" name="go-add-option" id="go-add-option" class="btn btn-secondary" wire:click.prevent="addOption">Add option</button>
        </div>

        @foreach($options as $option_id=>$option_name)
            <div class="mb-2">
                <label class="form-label" for="option_{{ $option_id }}">Option {{ $option_id }}</label>
                <div class="input-group mb-3">
                    <input type="text" id="option_{{ $option_id }}" class="form-control" wire:model.live="options.{{ $option_id }}">
                    <button class="btn btn-outline-secondary" type="button" wire:click.prevent="removeOption({{$option_id}})"><i class="fa fa-trash-alt"></i></button>
                </div>
                @error("options.{$option_id}")
                <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>
        @endforeach

        <button type="submit" class="btn btn-success">Create poll</button>
    </form>
</div>
