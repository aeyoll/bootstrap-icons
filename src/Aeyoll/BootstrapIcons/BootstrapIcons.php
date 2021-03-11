<?php

declare(strict_types=1);

namespace Aeyoll\BootstrapIcons;

class BootstrapIcons
{
    const BOOTSTRAP_ICON_DIR = 'twbs/icons/icons/';

    public function __construct()
    {
        // Get composer directory
        $reflection = new \ReflectionClass(\Composer\Autoload\ClassLoader::class);
        $vendorDir = dirname(dirname($reflection->getFileName()));

        // Force Bootstrap Icons path
        $this->bootstrapIconsPath = sprintf('%s%s%s', $vendorDir, DIRECTORY_SEPARATOR, self::BOOTSTRAP_ICON_DIR);
    }

    public function getIcon(string $name): string
    {
        $path = sprintf('%s%s.svg', $this->bootstrapIconsPath, $name);

        if (!file_exists($path)) {
            throw new IconNotFoundException(sprintf('Impossible to find icon %s, (path: %s)', $name, $path));
        }

        $icon = (string) file_get_contents($path);

        return $icon;
    }

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
