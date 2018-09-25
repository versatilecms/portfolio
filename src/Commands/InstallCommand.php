<?php

namespace Versatile\Portfolio\Commands;

use Versatile\Portfolio\Providers\PortfolioServiceProvider;
use Versatile\Core\Traits\Seedable;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Process\Process;

class InstallCommand extends Command
{
    use Seedable;

    protected $seedersPath = __DIR__ . '/../../database/seeds/';

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'versatile-portfolio:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Versatile Portfolio package';

    /**
     * Get the composer command for the environment.
     *
     * @return string
     */
    protected function findComposer()
    {
        if (file_exists(getcwd() . '/composer.phar')) {
            return '"' . PHP_BINARY . '" ' . getcwd() . '/composer.phar';
        }

        return 'composer';
    }

    public function fire(Filesystem $filesystem)
    {
        return $this->handle($filesystem);
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->info('Publishing Portfolio assets, database, and config files');
        $this->call('vendor:publish', ['--provider' => PortfolioServiceProvider::class]);

        $this->info('Migrating the database tables into your application');
        $this->call('migrate');

        $this->info('Seeding data into the database');
        $this->seed('PortfolioDatabaseSeeder');

        $this->info('Successfully installed Versatile Portfolio! Enjoy');
    }
}
