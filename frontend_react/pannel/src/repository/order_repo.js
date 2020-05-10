import order from "../models/order"


const OrderRepo = {
  order,
  
  get_products(){
    return this.order.products || []
  },

  add_product(objproduct){
    if(this.order.products)
      this.order.products.push(objproduct)
  }  

}

export default OrderRepo