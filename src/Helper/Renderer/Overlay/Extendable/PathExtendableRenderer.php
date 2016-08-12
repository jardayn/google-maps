<?php

/*
 * This file is part of the Ivory Google Map package.
 *
 * (c) Eric GELOEN <geloen.eric@gmail.com>
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code.
 */

namespace Ivory\GoogleMap\Helper\Renderer\Overlay\Extendable;

use Ivory\GoogleMap\Base\Bound;
use Ivory\GoogleMap\Helper\Renderer\AbstractRenderer;
use Ivory\GoogleMap\Overlay\ExtendableInterface;

/**
 * @author GeLo <geloen.eric@gmail.com>
 */
class PathExtendableRenderer extends AbstractRenderer implements ExtendableRendererInterface
{
    /**
     * {@inheritdoc}
     */
    public function render(ExtendableInterface $extendable, Bound $bound)
    {
        $formatter = $this->getFormatter();

        return $formatter->renderCall(
            $formatter->renderProperty($formatter->renderObjectCall($extendable, 'getPath'), 'forEach'),
            [
                $formatter->renderClosure(
                    $formatter->renderObjectCall($bound, 'extend', [$variable = 'b']),
                    [$variable]
                ),
            ]
        );
    }
}