document.addEventListener('click', function (e) {
    if (e.target.classList.contains('add-to-cart-btn')) {
        e.preventDefault(); // чтоб страница не обновлялась( пролистывалась вверх) при добавлении в корзину
        let productId = e.target.dataset.productId;
        addToCart(productId);
    }
    if (e.target.classList.contains('minus-from-cart-btn')) {
        e.preventDefault(); // чтоб страница не обновлялась( пролистывалась вверх) при добавлении в корзину
        let productId = e.target.dataset.productId;
        minusFromCart(productId);
    }
});

const addToCartBtns = document.querySelectorAll('add-to-cart-btns');
addToCartBtns.forEach(btn=> {
    btn.addEventListener('click', productAddToCart); //на каждую кнопку добавить в корзину добавили событие
})
// async function productAddToCart(){
//     try {
//         const productId = this.dataset.productId;
//
//         const response = await fetch('/cart/add/'+productId);
//         const json = await response.json();
//
//         if (json.success) {
//             let cartCount = document.querySelector('.cart-count');  // или document.querySelector('.cart-count').textContent = json.cartCount; но без проверки
//             if (cartCount != null){
//                 cartCount.textContent = json.cartCount;
//             }
//
//             let cartSum = document.querySelector('.cart-sum');
//             if (cartSum != null){
//                 cartSum.textContent = json.cartSum;
//             }
//
//             document.getElementById('cart-item-'+productId).textContent = json.count;
//         } else {
//             alert('Ошибка: ' + json.message);
//         }
//     } catch (error) {
//         alert('Произошла ошибка при добавлении в корзину');
//     }
// }

async function addToCart(productId) {
    // try {
        const response = await fetch('/cart/add/'+productId);
        const json = await response.json();

        if (json.success) {
            let cartCount = document.querySelector('.cart-count');  // или document.querySelector('.cart-count').textContent = json.cartCount; но без проверки
            let formClass = document.querySelector('.form-cart-class-' + productId);
            let btnClass = document.querySelector('.btn-cart-class-' + productId);

            if (cartCount != null) {
                cartCount.textContent = json.cartCount;
            }

            let cartSum = document.querySelector('.cart-sum');
            if (cartSum != null) {
                cartSum.textContent = json.cartSum;
            }

            if (formClass != null && btnClass != null) {
                if (json.count > 0) {
                    formClass.classList.remove('d-none');
                    btnClass.classList.add('d-none');
                }
            }

            document.getElementById('cart-item-'+productId).textContent = json.count;
        } else {
            alert('Ошибка: ' + json.message);
        }
    // } catch (error) {
    //     alert('Произошла ошибка при добавлении в корзину');
    // }
}

async function minusFromCart(productId) {
    try {
        const response = await fetch('/cart/minus/'+productId);
        const json = await response.json();
        let formClass = document.querySelector('.form-cart-class-' + productId);
        let btnClass = document.querySelector('.btn-cart-class-' + productId);

        if (json.success) {
            document.getElementById('cart-item-'+productId).textContent = json.count;

            let cartCount = document.querySelector('.cart-count');  // или document.querySelector('.cart-count').textContent = json.cartCount; но без проверки
            if (cartCount != null){
                cartCount.textContent = json.cartCount;
            }

            let cartSum = document.querySelector('.cart-sum');
            if (cartSum != null){
                cartSum.textContent = json.cartSum;
            }

            let product = document.querySelector('.item-cart-tr-' + productId);
            if (json.count == 0 && product != null){
                product.remove();
            }

            if (formClass != null && btnClass != null) {
                if(json.count == 0) {
                    btnClass.classList.remove('d-none');
                    formClass.classList.add('d-none');
                }
            }

        } else {
            alert('Ошибка: ' + json.message);
        }
    } catch (error) {
        alert('Произошла ошибка при добавлении в корзину');
    }
}



// console.log(product);
// console.table(json);
