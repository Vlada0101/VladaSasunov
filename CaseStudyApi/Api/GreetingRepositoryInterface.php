<?php

declare(strict_types=1);

namespace VladaSasunov\CaseStudyApi\Api;

interface GreetingRepositoryInterface
{
    /**
     * @return string
     */
    public function getGreetingMessage(): string;
}
