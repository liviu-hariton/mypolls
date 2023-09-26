<?php

namespace App\Livewire;

use App\Models\Option;
use App\Models\Poll;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Attributes\On;
use Livewire\Component;

class Polls extends Component
{
    #[On('pollCreated')]
    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $polls = Poll::with('options.votes')
            ->latest()
            ->get();

        return view('livewire.polls', ['polls' => $polls]);
    }

    /*public function vote($option_id): void
    {
        $option = Option::findOrFail($option_id);

        $option->votes()->create();
    }*/

    public function vote(Option $option): void
    {
        $option->votes()->create();
    }
}
