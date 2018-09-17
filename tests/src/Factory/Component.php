<?php

namespace MageSuite\ContentConstructor\Factory;

interface Component {
    /**
     * Renders component with specified configuration
     * @param array $configuration
     * @return mixed
     */
    public function render(array $configuration);
}
