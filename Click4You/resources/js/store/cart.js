import { defineStore } from 'pinia';

export const useCartStore = defineStore('cart', {
  
  // ==========================================================
  // ESTADO (STATE): El carrito
  // ==========================================================
  state: () => ({
    items: [], // Array de objetos: [{ productId: 1, name: '...', price: 100, quantity: 1 }]
  }),

  // ==========================================================
  // GETTERS: Cálculos derivados del estado
  // ==========================================================
  getters: {
    totalItems: (state) => {
      // Calcula la suma total de la cantidad de todos los productos
      return state.items.reduce((total, item) => total + item.quantity, 0);
    },
    cartTotal: (state) => {
      // Calcula el costo total del carrito
      return state.items.reduce((total, item) => total + (item.price * item.quantity), 0).toFixed(2);
    }
  },

  // ==========================================================
  // ACCIONES (ACTIONS): Modificación del carrito
  // ==========================================================
  actions: {
    /**
     * Añade o incrementa un producto en el carrito.
     * @param {Object} product - Objeto del producto
     */
    addToCart(product) {
      const existingItem = this.items.find(item => item.productId === product.id);

      if (existingItem) {
        existingItem.quantity++;
      } else {
        this.items.push({
          productId: product.id,
          name: product.name,
          price: product.price,
          quantity: 1
        });
      }
    },
    
    /**
     * Elimina un artículo del carrito
     * @param {number} productId - ID del producto
     */
    removeFromCart(productId) {
      this.items = this.items.filter(item => item.productId !== productId);
    },
    
    /**
     * Vacía completamente el carrito
     */
    clearCart() {
      this.items = [];
    }
  }
});