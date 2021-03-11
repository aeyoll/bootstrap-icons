<?php

/**
 * Get or display a Bootstrap icon.
 *
 * @author Jean-Philippe Bidegain <jp@bidega.in>
 * @license https://github.com/aeyoll/bootstrap-icons/blob/master/LICENCE.md MIT licence
 */

declare(strict_types=1);

namespace Aeyoll\BootstrapIcons;

/**
 * Get or display a Bootstrap icon.
 */
class BootstrapIcons
{
    /**
     * The name of bootstrap icons directory.
     *
     * @var string
     */
    private const BOOTSTRAP_ICON_DIR = 'twbs/icons/icons/';

    /**
     * Constructor
     */
    public function __construct()
    {
        // Get composer directory
        $reflection = new \ReflectionClass(\Composer\Autoload\ClassLoader::class);
        $vendorDir = dirname(dirname($reflection->getFileName()));

        // Force Bootstrap Icons path
        $this->bootstrapIconsPath = sprintf('%s%s%s', $vendorDir, DIRECTORY_SEPARATOR, self::BOOTSTRAP_ICON_DIR);
    }

    /**
     * Get the content of a Bootstrap icon
     *
     * @param string $name
     * @return string
     * @throws IconNotFoundException
     */
    public function getIcon(string $name): string
    {
        $path = sprintf('%s%s.svg', $this->bootstrapIconsPath, $name);

        if (!file_exists($path)) {
            throw new IconNotFoundException(sprintf('Impossible to find icon %s, (path: %s)', $name, $path));
        }

        $icon = (string) file_get_contents($path);

        return $icon;
    }

    /**
     * Display the content of a Bootstrap icon
     *
     * @param string $name
     * @return void
     */
    public function displayIcon(string $name): void
    {
        try {
            $icon = $this->getIcon($name);
        } catch (IconNotFoundException $e) {
            $icon = '';
        }

        echo $icon;
    }
}
