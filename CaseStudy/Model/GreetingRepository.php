<?php

declare(strict_types=1);

namespace VladaSasunov\CaseStudy\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Store\Model\ScopeInterface;
use VladaSasunov\CaseStudyApi\Api\GreetingRepositoryInterface;

class GreetingRepository implements GreetingRepositoryInterface
{
    const CONFIG_PATH = 'greeting/general/greeting_message';

    /**
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(protected ScopeConfigInterface $scopeConfig)
    {
    }

    /**
     * @inheritdoc
     */
    public function getGreetingMessage(): string
    {
        //Getting the message value from config
        return $this->scopeConfig->getValue(self::CONFIG_PATH, ScopeInterface::SCOPE_STORE) ?? "";
    }
}
