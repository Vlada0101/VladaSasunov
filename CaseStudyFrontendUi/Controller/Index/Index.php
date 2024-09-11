<?php

declare(strict_types=1);

namespace VladaSasunov\CaseStudyFrontendUi\Controller\Index;

use Magento\Framework\App\Action\HttpGetActionInterface;
use VladaSasunov\CaseStudyApi\Api\GreetingRepositoryInterface;
use Magento\Framework\View\Result\PageFactory;

class Index implements HttpGetActionInterface
{
    /**
     * Constructor
     *
     * @param PageFactory $resultPageFactory
     * @param GreetingRepositoryInterface $greetingRepository
     */
    public function __construct(
        protected PageFactory $resultPageFactory,
        protected GreetingRepositoryInterface $greetingRepository
    ) {}

    /**
     * Execute method
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        // Get the greeting message
        $greetingMessage = $this->greetingRepository->getGreetingMessage();

        // Create a result page
        $resultPage = $this->resultPageFactory->create();

        // Show the message
        $resultPage->getLayout()->getBlock('greeting.message')->setGreetingMessage($greetingMessage);

        return $resultPage;
    }
}
