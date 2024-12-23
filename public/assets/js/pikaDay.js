document.addEventListener('DOMContentLoaded', function () {
    const spanElement = document.querySelector('#date-span');
    const currentDate = "{{ request('date', now()->toDateString()) }}";

    if (spanElement) {
        const picker = new Pikaday({
            field: spanElement,
            format: 'YYYY-MM-DD',
            defaultDate: new Date(currentDate),
            setDefaultDate: true,
            position: 'bottom-right',
            i18n: {
                previousMonth: 'Previous Month',
                nextMonth: 'Next Month',
                months: [
                    'Janeiro',
                    'Fevereiro',
                    'Março',
                    'Abril',
                    'Maio',
                    'Junho',
                    'Julho',
                    'Agosto',
                    'Setembro',
                    'Outubro',
                    'Novembro',
                    'Dezembro',
                ],
                weekdays: [
                    'Domingo',
                    'Segunda-feira',
                    'Terça-feira',
                    'Quarta-feira',
                    'Quinta-feira',
                    'Sexta-feira',
                    'Sábado',
                ],
                weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
            },

            onSelect: function (date) {
                const year = String(date.getFullYear());
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const day = String(date.getDate()).padStart(2, '0');

                const formattedDate = `${year}-${month}-${day}`;

                const url = new URL(window.location.href);
                url.searchParams.set('date', formattedDate);
                window.location.href = url.toString();
            },
        });
        spanElement.addEventListener('click', () => {
            picker.show();
        });
    }
});
