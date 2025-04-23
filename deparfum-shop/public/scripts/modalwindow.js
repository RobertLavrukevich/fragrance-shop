const basketOpen = document.getElementById('basket-open');
const basketClose = document.getElementById('basket-close');
const basket = document.querySelector('.basket');
const body = document.querySelector('body');




basketOpen.addEventListener('click', () =>{
    basket.style.right = '0px';
    body.style.position = 'fixed';
    body.style.overflowY = 'scroll';
});
basketClose.addEventListener('click', () => {
    basket.style.right = '-400px';
    body.style.position = 'absolute';
});












// fetch('php_scripts/get_cart_items.php')
//         .then(response => response.json())
//         .then(items => {
//             cartItemsContainer.innerHTML = ''; // Очистить старые данные
//             if (items.length > 0) {
//                 emptyCart.style.display = 'none';
//                 cartItemsContainer.style.display = 'block';

//                 items.forEach(item => {
//                     cartItemsContainer.innerHTML += `
//                         <div class="cart-item">
//                             <img src="${item.product_image}" alt="${item.productBrandName}">
//                             <div class="cart-item-details">
//                                 <p>${item.productBrandName}</p>
//                                 <p>${item.quantity} x ${item.productPrice} BYN</p>
//                             </div>
//                             <button class="remove-item" data-product-id="${item.productID}">Удалить</button>
//                         </div>
//                     `;
//                 });
//                 document.querySelectorAll('.remove-item').forEach(button => {
//                     button.addEventListener('click', (e) => {
//                         const productId = e.target.getAttribute('data-product-id');
//                         removeItemFromCart(productId);
//                     });
//                 });
//             } else {
//                 emptyCart.style.display = 'block';
//                 cartItemsContainer.style.display = 'none';
//             }
//         });
// });







// // Функция для удаления товара из корзины
// function removeItemFromCart(productId) {
//     fetch('php_scripts/remove_from_cart.php', {
//         method: 'POST',
//         headers: { 'Content-Type': 'application/json' },
//         body: JSON.stringify({ productId })
//     })
//         .then(response => response.json())
//         .then(data => {
//             if (data.success) {
//                 basketOpen.click(); // Обновить корзину
//             } else {
//                 alert('Ошибка при удалении товара из корзины');
//             }
//         });
// }