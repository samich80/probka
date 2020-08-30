import productList from '../../../config/products';
import { roundToTwoDigits } from '../../../utils/formatters';

class Cart {
  static cart;

  static addProduct({ id, amount }) {
    const currentCart = Cart.getCart();
    const currentProduct = currentCart.find((cp) => cp.id === id);
    if (currentProduct) {
      currentProduct.amount += amount;
    } else {
      currentCart.push({ id, amount, ...productList.find((p) => p.id === id) });
    }
    Cart.updateSavedCart();
  }

  static removeProduct(id) {
    Cart.cart = Cart.getCart().filter((cp) => cp.id !== id);
    Cart.updateSavedCart();
  }

  static updateProduct(id, data) {
    Cart.cart = Cart.getCart().map((cp) => {
      if (cp.id !== id) return cp;
      return { ...cp, ...data };
    });
    Cart.updateSavedCart();
  }

  static updateSavedCart() {
    window.dispatchEvent(new CustomEvent('cartUpdate'));
    localStorage.setItem('cart', JSON.stringify(Cart.cart.map((cp) => ({ id: cp.id, amount: cp.amount }))));
  }

  static getCart() {
    if (!Cart.cart) {
      Cart.cart = JSON.parse(localStorage.getItem('cart')) || [];
      Cart.cart = Cart.cart
                      .filter((sp) => productList.find((p) => p.id === sp.id))
                      .map((sp) => ({ ...sp, ...productList.find((p) => p.id === sp.id) }));
    }

    return Cart.cart;
  }

  static submitCartWhatsApp(e) {
    e.preventDefault();
    const url = `${e.target.href}?text=${Cart.getOrderText()}&lang=ru`;
    window.open(url, '_blank');
  }

  static getOrderText() {
    if (!Cart.getCart().length) {
      return 'Здравствуйте, расскажите, пожалуйста, об услуге предварительного заказа в вашем магазине.';
    }
    const date = new Date();
    const orderNumber =
      `${date.getDate()}${date.getHours()}${date.getMinutes()}${Math.random().toString().substr(-1)}`;
    let text = `Заказ №${orderNumber} с сайта ${location.host}: \n\r`;
    Cart.getCart()
        .forEach(
          (p, i) =>
            text += `${i + 1}) ${p.title} - ${p.amount} ${p.measure}${i < Cart.getCart().length - 1 ? ';' : '. '} \n`);
    text += `\nПредварительная сумма заказа: ${Math.ceil(Cart.getTotalSum())} руб. `;
    return encodeURI(text);
  }

  static getTotalSum() {
    return roundToTwoDigits(Cart.getCart().reduce((sum, p) => sum + ((p.price * p.amount) / p.priceAmountStep), 0));
  }
}

export default Cart;
