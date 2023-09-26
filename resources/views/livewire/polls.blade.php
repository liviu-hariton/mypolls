<div>
    <h2>Current polls</h2>

    @foreach($polls as $poll)
        <div class="mt-2 mb-2">
            <h4>{{ $poll->title }}</h4>

            <ul class="list-unstyled">
                @foreach($poll->options as $option)
                <li class="mb-2">
                    <button class="btn btn-sm btn-primary" wire:click="vote({{ $option->id }})">Vote</button>
                    {{ $option->name }} ({{ $option->votes->count() }})
                </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>
