// fashion.js

document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', function() {
        const productCard = this.parentElement;
        const productName = productCard.querySelector('h3').innerText;
        const productPrice = productCard.querySelector('p').innerText;

        // Logic to add the product to the cart (localStorage or back-end call)
        alert(`${productName} has been added to your cart for ${productPrice}.`);
    });
});
