window.onload = function () {
  const cartItems = JSON.parse(localStorage.getItem("cart")) || [];
  const cartList = document.getElementById("cart-list");

  cartItems.forEach((item) => {
    const listItem = document.createElement("li");
    listItem.textContent = item;
    cartList.appendChild(listItem);
  });
};

function checkout() {
  window.location.href = "checkout.html";
}
