<?php

declare(strict_types=1);

namespace VladaSasunov\CaseStudy\Model;

use Magento\Store\Model\ScopeInterface;
use VladaSasunov\CaseStudyApi\Api\GreetingRepositoryInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;

class GreetingRepository implements GreetingRepositoryInterface
{
    const CONFIG_PATH = 'greeting/general/greeting_message';

    public function __construct(protected ScopeConfigInterface $scopeConfig)
    {
    }

    /**
     * @inheritdoc
     */
    public function getGreetingMessage(): string
    {
        return $this->scopeConfig->getValue(self::CONFIG_PATH, ScopeInterface::SCOPE_STORE) ?? "";
    }
}
