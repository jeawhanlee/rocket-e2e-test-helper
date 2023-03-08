<?php 

declare(strict_types=1);

namespace WP_Rocket_e2e\App;

use League\Container\ServiceProvider\AbstractServiceProvider;
use WP_Rocket_e2e\App\Assets\Assets;
use WP_Rocket_e2e\App\Assets\Subscriber as AssetsSubscriber;

use WP_Rocket_e2e\App\Admin\Template;
use WP_Rocket_e2e\App\Admin\Subscriber as TemplateSubscriber;

class ServiceProvider extends AbstractServiceProvider {

    public function provides( string $id ) : bool
    {
        $services = [
            'assets',
            'assets_subscriber',
            'template',
            'template_subscriber',
        ];
        
        return in_array( $id, $services );
    }

    public function register() : void
    {
        $this->getContainer()->add( 'assets', Assets::class );

        $this->getContainer()->add( 'assets_subscriber', AssetsSubscriber::class )
        ->addArgument( $this->getContainer()->get( 'config_assets' ) )
        ->addArgument( $this->getContainer()->get( 'assets' ) );

        $this->getContainer()->add( 'template', Template::class );

        $this->getContainer()->add( 'template_subscriber', TemplateSubscriber::class )
        ->addArgument( $this->getContainer()->get( 'template' ) );
    }
}