import order from "../models/order"
import LocalDb from "../helpers/local_db"
import _ from "lodash"

const OrderRepo = {
  order,
  
  get_products(){
    return this.order.products || []
  },

  is_product(objproduct){
    return this.order.products.filter(product => product.id === objproduct.id).length>0
  },

  add_product(objproduct){
    if(this.is_product(objproduct)){
      const res = _.unionBy([objproduct], this.order.products, 'id')
      this.order.products = res
    }
    else{
      this.order.products.push(objproduct)
    }
  },

  remove_product(objproduct){
    if(this.is_product(objproduct)){
      if(objproduct.units===0){
        const res = _.remove(this.order.products,{id:objproduct.id})
        this.order.products = res
      }
    }
    else{
      this.order.products.push(objproduct)
    }
  },

  get_product(id){
    const products = this.order.products
    const res = products.filter(product => product.id === id)
    if(res.length>0)
      return res[0]
    return null
  },

  get_units(prodid){
    const product = this.get_product(prodid)
    if(product)
      return product.units
    return 0
  },

  save(){
    LocalDb.save("order",this.order)
  }

}

export default OrderRepo