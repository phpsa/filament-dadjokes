<?php

namespace Phpsa\FilamentDadJokes;

use Spatie\LaravelPackageTools\PackageServiceProvider;
use Spatie\LaravelPackageTools\Package;
use Phpsa\FilamentDadJokes\Widgets\DadJokeWidget;

class FilamentDadJokesProvider extends PackageServiceProvider
{
    public static string $name = 'filament-dadjokes';

    protected array $widgets = [
        DadJokeWidget::class
    ];

    public function configurePackage(Package $package): void
    {
        $package->name('filament-dadjokes')->hasViews()->hasConfigFile();
    }
}
