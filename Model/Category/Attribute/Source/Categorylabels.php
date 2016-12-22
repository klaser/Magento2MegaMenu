<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Jnext\Megamenu\Model\Category\Attribute\Source;
use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Catalog product landing page attribute source
 *
 * @author     Magento Core Team <core@magentocommerce.com>
 */
class Categorylabels extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    /**
     * @return array
     */
    public function getAllOptions()
    {

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();    
        $scopeConfig = $objectManager->get('Magento\Framework\App\Config\ScopeConfigInterface');

        $option = array();
        $option[] = ['value' => '', 'label' => __('No Label')];
        $i = 1;
        while($i<5)
        {
            $categoryLabelId = "category_label".$i;
            if($categoryLabelLabel=$scopeConfig->getValue('jnext_mega_config/category_labels/'.$categoryLabelId, ScopeConfigInterface::SCOPE_TYPE_DEFAULT))
                $option[] = ['value' => $categoryLabelId, 'label' => __($categoryLabelLabel)];
            $i++;
        }
        return $option;
    }
}