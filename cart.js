// cart.js

// Example function to remove items from the cart
document.querySelectorAll('.remove-item').forEach(button => {
    button.addEventListener('click', function() {
        const cartItem = this.parentElement.parentElement;
        cartItem.remove(); // Remove the item from the cart

        // Optionally, update total amount here
        updateTotal();
    });
});

// Function to update the total amount
function updateTotal() {
    let total = 0;
    document.querySelectorAll('.cart-item').forEach(item => {
        const price = parseFloat(item.querySelector('p').innerText.replace('$', ''));
        const quantity = item.querySelector('input[type="number"]').value;
        total += price * quantity;
    });
    document.getElementById('total-amount').innerText = `$${total.toFixed(2)}`;
}

// Example function for checkout button (add your checkout logic)
document.getElementById('checkout-button').addEventListener('click', function() {
    alert('Proceeding to checkout...');
    // Redirect to checkout page or perform checkout logic
});
