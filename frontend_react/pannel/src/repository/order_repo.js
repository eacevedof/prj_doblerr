import order from "../models/order"


const OrderRepo = {
  order,
  
  get_products(){
    return order.products
  },

  

}

export default OrderRepo