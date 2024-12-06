let cart = [];

function addToCart(bookTitle) {
  cart.push(bookTitle);
  alert(`${bookTitle} has been added to the cart!`);
  localStorage.setItem("cart", JSON.stringify(cart)); // Save cart to localStorage
}
