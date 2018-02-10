<?php
$installer = $this;
$installer->startSetup();

$installer->run("ALTER TABLE  sales_flat_order_grid ADD COLUMN subiekt_response  VARCHAR(255)");

$installer->addAttribute(
    'order',
    'subiekt_response',
    array(
        'type'          => 'text',
        'backend_type'  => 'text',
        'frontend_input' => 'text',
        'is_user_defined' => true,
        'label'         => 'Subiekt Status',
        'visible'       => true,
        'required'      => false,
        'user_defined'  => false,
        'searchable'    => false,
        'filterable'    => false,
        'comparable'    => false,
        'default'       => '',
    )
);

$installer->endSetup();