<?php

namespace App\Livewire;

use App\Models\Poll;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Livewire\Component;

class CreatePoll extends Component
{
    public string $title;
    public array $options = ['First'];

    protected array $rules = [
        'title' => 'required|min:3|max:255',
        'options' => 'required|array|min:1|max:10',
        'options.*' => 'required|min:1|max:255'
    ];

    protected array $messages = [
        'options.*' => 'The option is required  '
    ];

    public function render(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('livewire.create-poll');
    }

    public function addOption()
    {
        $this->options[] = '';
    }

    public function removeOption($index)
    {
        unset($this->options[$index]);

        $this->options = array_values($this->options);
    }

    public function updated($property_name)
    {
        return $this->validateOnly($property_name);
    }

    public function createPoll()
    {
        /*$poll = Poll::create([
            'title' => $this->title
        ]);

        foreach($this->options as $option) {
            $poll->options()->create([
                'name' => $option
            ]);
        }*/

        $this->validate();

        Poll::create([
            'title' => $this->title
        ])->options()->createMany(
            collect($this->options)
                ->map(fn($option) => ['name' => $option])
                ->all()
        );

        $this->reset(['title', 'options']);

        $this->dispatch('pollCreated');
    }
}
