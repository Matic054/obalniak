document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM fully loaded');

    var link = document.querySelector('.prijava');
    var modal = document.getElementById('loginModal');
    var close = modal.querySelector('.close');

    if (link && modal && close) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            console.log('Link clicked');
            modal.style.display = 'block';
        });

        close.addEventListener('click', function() {
            console.log('Close button clicked');
            modal.style.display = 'none';
        });
    }
});
