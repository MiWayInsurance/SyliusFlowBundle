<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sylius\Bundle\FlowBundle\Process\Step;

use Sylius\Bundle\FlowBundle\Process\Context\ProcessContextInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

@trigger_error(sprintf('The "%s" class is deprecated', LegacyAbstractControllerStep::class), E_USER_DEPRECATED);

/**
 * @deprecated use the {@see AbstractControllerStep} instead
 *
 * Step class which extends the base Symfony2 controller.
 *
 * @author Paweł Jędrzejewski <pawel@sylius.org>
 */
abstract class LegacyAbstractControllerStep extends Controller implements StepInterface
{
    /**
     * Step name in current scenario.
     *
     * @var string
     */
    protected $name;

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * {@inheritdoc}
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function forwardAction(ProcessContextInterface $context)
    {
        return $this->complete();
    }

    /**
     * {@inheritdoc}
     */
    public function isActive()
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    public function complete()
    {
        return new ActionResult();
    }

    /**
     * {@inheritdoc}
     */
    public function proceed($nextStepName)
    {
        return new ActionResult($nextStepName);
    }
}
