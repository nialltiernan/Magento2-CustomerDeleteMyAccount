<?php
declare(strict_types=1);

namespace Niall\CustomerDeleteMyAccount\Controller\CustomerDelete;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

/**
 * USEFULL_DESCRIPTION_HERE
 *
 * @author Niall Tiernan <n.tiernan@youwe.nl>
 */
class Delete extends Action
{

    /**
     * @var Session
     */
    private $session;
    /**
     * @var CustomerRepositoryInterface
     */
    private $repository;

    /**
     * Constructor
     *
     * @param Context                     $context
     * @param Session                     $session
     * @param CustomerRepositoryInterface $repository
     */
    public function __construct(Context $context, Session $session, CustomerRepositoryInterface $repository)
    {
        parent::__construct($context);
        $this->session = $session;
        $this->repository = $repository;
    }

    public function execute()
    {
        $customer = $this->repository->getById($this->session->getCustomerId());
        $this->repository->delete($customer);
        return $this->_redirect('customer/account/logout');
    }
}
