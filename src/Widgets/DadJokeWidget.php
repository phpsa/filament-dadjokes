<?php

namespace Phpsa\FilamentDadJokes\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class DadJokeWidget extends Widget
{
    protected static string $view = 'filament-dadjokes::filament.widgets.dadjokes';

    protected function getViewData(): array
    {
        return [
            'joke' => $this->getJoke()
        ];
    }

    protected function getJoke()
    {

        try {
            $json = Http::acceptJson()->get('https://icanhazdadjoke.com/')->throw()->json();
            return $json['joke'];
        } catch (\Throwable $e) {
            return null;
        }
    }
}
