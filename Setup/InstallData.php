<?php

namespace Atvise\BottomCategoryDescription\Setup;

use Magento\Framework\Setup\{
    ModuleContextInterface,
    ModuleDataSetupInterface,
    InstallDataInterface
};

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;

class InstallData implements InstallDataInterface
{
    private $eavSetupFactory;

    public function __construct(EavSetupFactory $eavSetupFactory) {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $setup->startSetup();

        $eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
        $eavSetup->addAttribute(\Magento\Catalog\Model\Category::ENTITY, 'description_bottom', [
            'type'     => 'text',
            'label'    => 'Bottom Description',
            'input'    => 'textarea',
            'visible'  => true,
            'sort_order' => 0,
            'required' => false,
            'wysiwyg_enabled' => true,
            'is_html_allowed_on_front' => true,
            'global'   => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_STORE,
            'group'    => 'Content',
        ]);
        $setup->endSetup();
    }
}
