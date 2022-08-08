<?php

namespace Phpsa\FilamentDadJokes\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class DadJokeWidget extends Widget
{
    protected static string $view = 'filament-dadjokes::filament.widgets.dadjokes';

     /**
     * @return array<string, ?string>
     */
    protected function getViewData(): array
    {

        $choice = collect(config('filament-dadjokes.services', []))->filter()->keys()->shuffle()->first();
        if ($choice === null) {
            return [
                'joke' => false
            ];
        }
        $call = Str::of($choice)->singular()->camel()->toString();

        if (! method_exists($this, $call)) {
            return [
                'joke' => false
            ];
        }

        return Cache::remember("dadjokes.{$call}", config('filament-dadjokes.cache', 5), fn() => $this->$call());
    }

    protected function dadJoke(): array
    {
        try {
            $json = Http::timeout(2)->get('https://icanhazdadjoke.com/')->throw()->json();
            return [
                'joke'         => $json['joke'],
                'provider_url' => 'https://icanhazdadjoke.com/',
                'provider'     => 'icanhazdadjoke.com',
            ];
        } catch (\Throwable $e) {
            return [
                'joke' => false
            ];
        }
    }

    protected function chuckJoke(): array
    {
        try {
            $json = Http::timeout(2)->get('https://api.chucknorris.io/jokes/random')->throw()->json();
            return [
                'joke'         => $json['value'],
                'provider_url' => 'https://api.chucknorris.io',
                'provider'     => 'chucknorris.io',
            ];
            return $json['value'];
        } catch (\Throwable $e) {
            return [
                'joke' => false
            ];
        }
    }

    public static function canView(): bool
    {
        return collect(config('filament-dadjokes.services', []))->filter()->isNotEmpty();
    }
}
