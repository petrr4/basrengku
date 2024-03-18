let openShopping = document.querySelector('.shop');
        let closeShopping = document.querySelector('.closeShopping');
        let list = document.querySelector('.list');
        let listCard = document.querySelector('.listCard');
        let body = document.querySelector('body');
        let total = document.querySelector('.total');
        let quantity = document.querySelector('.quantity');

        openShopping.addEventListener('click', () => {
            body.classList.add('active');
        });

        closeShopping.addEventListener('click', () => {
            body.classList.remove('active');
        });

        let products = [
            {
                id: 1,
                name: 'Makaroni',
                image: '../assets/makaroni.jpg',
                price: 30000 
            },
            {
                id: 2,
                name: 'Basreng',
                image: '../assets/basreng.jpg',
                price: 25000
            },
            {
                id: 3,
                name: 'Keripik',
                image: '../assets/keripik.jpg',
                price: 20000
            },
        ];

        let listCards = {};

        function initApp() {
            products.forEach((value, key) => {
                let newDiv = document.createElement('div');
                newDiv.classList.add('item');
                newDiv.innerHTML = `<img src="${value.image}"> <!-- Tag img ditutup dengan benar -->
                    <div class="title">${value.name}</div>
                    <div class="price">${value.price.toLocaleString()}</div>
                    <button onclick="addToCart(${key})">Tambah ke Keranjang</button>`;
                list.appendChild(newDiv);
            });
        }
        

        initApp();

        function addToCart(key) {
            if (listCards[key] == null) {
                listCards[key] = { ...products[key], quantity: 1 };
            } else {
                listCards[key].quantity++;
            }
            reloadCart();
        }

        function removeItem(key) {
            if (listCards[key] && listCards[key].quantity > 0) {
                listCards[key].quantity--;
                if (listCards[key].quantity === 0) {
                    delete listCards[key];
                }
                reloadCart();
            }
        }


        function reloadCart() {
            listCard.innerHTML = '';
            let count = 0;
            let totalPrice = 0;
            for (let key in listCards) {
                if (listCards[key] != null) {
                    const item = listCards[key];
                    totalPrice += item.price * item.quantity;
                    count += item.quantity;
                    let newDiv = document.createElement('li');
                    newDiv.innerHTML = `
                        <div><img src="../assets/${item.image}"/></div>
                        <div>
                            <button class="remove-button" onclick="removeItem(${key})">-</button>
                            ${item.name}
                            <button class="add-button" onclick="addToCart(${key})">+</button>
                        </div>
                        <div class="count">${item.quantity}</div>
                        <div class="price">${item.price.toLocaleString()}</div>`;
                    listCard.appendChild(newDiv);
                }
            }
        
            // Tambahkan tombol Checkout
        

            // Tambahkan tombol Checkout
let checkoutButton = document.createElement('button');
checkoutButton.textContent = 'Checkout';
checkoutButton.className = 'checkout-button'; // Tambahkan class checkout-button
checkoutButton.addEventListener('click', () => {
    // Redirect ke halaman checkout.html
    window.location.href = 'checkout.html'; // Sesuaikan dengan path ke halaman checkout Anda
});

listCard.appendChild(checkoutButton);

    total.textContent = totalPrice.toLocaleString();
    quantity.textContent = count;

    // Update elemen HTML untuk total biaya pada review order
    let totalAmountElement = document.getElementById('totalAmount');
    totalAmountElement.textContent = 'Total: Rp ' + totalPrice.toLocaleString();

    // Update elemen HTML untuk daftar barang pada review order
    let orderedItemsElement = document.getElementById('orderedItems');
    orderedItemsElement.innerHTML = ''; // Bersihkan isi sebelumnya

    for (let key in listCards) {
        if (listCards[key] != null) {
            const item = listCards[key];
            let listItem = document.createElement('li');
            listItem.textContent = `${item.name} x ${item.quantity} - Rp ${item.price.toLocaleString()}`;
            orderedItemsElement.appendChild(listItem);
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Panggil reloadCart di sini atau tempatkan pemanggilan sesuai kebutuhan
        reloadCart();
    });
    
}

        
