function addToWishlist(button) {
    const url = button.getAttribute('data-url');

    fetch(url, {
            method: 'GET', // Or 'POST' if that's how your route is set up
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
        })
        .then(response => response.json())
        .then(data => {
            console.log('Wishlist Response:', data);
            // Reload the page to reflect changes
            window.location.reload();
        })
        .catch(error => {
            console.error('Error adding to wishlist:', error);
        });
}