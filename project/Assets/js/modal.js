document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM fully loaded');

    var link = document.querySelector('.prijava');
    var modal = document.querySelector('.login-container');
    var close = document.querySelector('.close');

    if (link && modal && close) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            console.log('Link clicked');
            modal.style.visibility = 'visible';
        });

        close.addEventListener('click', function() {
            console.log('Close button clicked');
            modal.style.visibility = 'hidden';
        });
    }
});
