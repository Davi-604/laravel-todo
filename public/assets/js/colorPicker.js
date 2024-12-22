document.addEventListener('DOMContentLoaded', () => {
    const pickr = Pickr.create({
        el: '#color-picker',
        theme: 'nano',
        default: document.querySelector('#color-input').value || '#3498db',
        swatches: [
            '#F44336',
            '#E91E63',
            '#9C27B0',
            '#673AB7',
            '#3F51B5',
            '#2196F3',
            '#03A9F4',
            '#00BCD4',
            '#009688',
            '#4CAF50',
            '#8BC34A',
            '#CDDC39',
            '#FFEB3B',
            '#FFC107',
        ],
        components: {
            preview: true,
            opacity: false,
            hue: true,
            interaction: {
                hex: true,
                input: true,
                save: true,
            },
        },
    });

    pickr.on('save', (color, instance) => {
        const hexColor = color.toHEXA().toString();
        document.querySelector('#color-input').value = hexColor;
        pickr.hide();
    });
});
