wp.domReady(() => {
    // Disable default button styles
    wp.blocks.unregisterBlockStyle('core/button', 'default');
    wp.blocks.unregisterBlockStyle('core/button', 'outline');
    wp.blocks.unregisterBlockStyle('core/button', 'squared');
    wp.blocks.unregisterBlockStyle('core/button', 'fill');

    // Disable large quote style
    wp.blocks.unregisterBlockStyle('core/quote', 'small');
    wp.blocks.unregisterBlockStyle('core/pullquote', 'default');

    // Disable solid color pullquote
    //wp.blocks.unregisterBlockStyle('core/pullquote', 'solid-color');
    
    wp.blocks.registerBlockStyle('core/button', {
        name: 'primary',
        label: 'Primary',
        isDefault: true,
    });
    
});