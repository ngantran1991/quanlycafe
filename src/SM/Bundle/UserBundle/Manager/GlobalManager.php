<?php

namespace SM\Bundle\UserBundle\Manager;

use SM\Bundle\UserBundle\Constants\Configs;
use Doctrine\ORM\EntityManager;

/**
 * Description of GlobalManager
 *
 */
class GlobalManager
{

    public $em;
    protected $container;
    protected $translator;
    protected $router;
    public $userRepo;
    public $exchangeRepo;
    public $typeExchangeRepo;
    public $typePriceRepo;
    
    /**
     * Construct
     *
     * @param type $em
     * @param type $container
     * @param type $translator
     * @param type $router
     */
    public function __construct(EntityManager $em, $container, $translator, $router)
    {

        $this->em = $em;
        $this->container = $container;
        $this->translator = $translator;
        $this->router = $router;
        $this->userRepo = $em->getRepository('UserBundle:User');
        $this->exchangeRepo = $em->getRepository('UserBundle:Exchange');
        $this->typeExchangeRepo = $em->getRepository('UserBundle:TypeExchange');
        $this->typePriceRepo = $em->getRepository('UserBundle:TypePrice');

    }

    /**
     * Get message by key from ParameterTb
     *
     * @param string $message
     * @param string $language
     * @return string
     */
    public function __($message, $language = 'fr')
    {
        $result = $this->parametresRepo->getParametreByNom($message, $language);

        return $result;

    }

    /**
     *
     * @param type $paramKey
     * @return type
     */
    public function getParamConfig($paramKey)
    {
        return $this->container->getParameter($paramKey);

    }

    /**
     * Get entity manager
     * @return type
     */
    public function getEntityManager()
    {
        return $this->em;

    }

}
