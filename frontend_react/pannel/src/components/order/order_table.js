import React, {useState, useEffect} from 'react'
import DateTime from "../../helpers/date_time"
import _ from "lodash"

const BASE_URL = process.env.REACT_APP_BASEURLAPI

const OrderTable = ({order,set_order}) => {
  
  const [products, set_products] = useState(order.products)
  const [total, set_total] = useState(0)

  const get_total = products => {
    const sum = products
                  .map(product => parseFloat(product.priceSale) * parseFloat(product.units))
                  .reduce((ac,price)=> ac = ac + price,0)
    //console.log("SUM",sum)  
    return sum
  }

  useEffect(() => {
    //si cambia el pedido hay que refrescar los productos y el total
    console.log("ordertable.useeffect.order",order)
    set_products(order.products)
    const total = get_total(order.products)
    set_total(total)

  },[order]);

  const get_trs = products => products.map( (product,i) => (
    <tr key={DateTime.get_ymdhis()}>
      <td>{i+1}</td>
      <td>{product.descriptionFull}</td>
      <td><img 
            src={`${BASE_URL}/pictures/products/product_0.png`} 
            alt={product.descriptionFull}
            className="img-thumbnail"
            height="45" width="45"
            /></td>
      <td>
        <sub>{product.units} x </sub>
        <sub>{_.round(product.priceSale,2).toFixed(2)}</sub>
      </td> 
      <td>
        <span>{_.round(product.priceSale * product.units,2).toFixed(2)}</span>
      </td>
      <td>
        <div className="input-group">
          <button type="button" className="btn btn-danger btn-fill pull-left" prodid={product.id}>
            <i className="fa fa-trash fa-lg" aria-hidden="true"></i>
          </button>
        </div>
      </td>
    </tr>
  ))//get_trs

  const trs = get_trs(products)
  
  return (
    <div className="card strpied-tabled-with-hover">
      <div className="card-header ">
          <h4 className="card-title">Order Cart</h4>
          <p className="card-category">Products you have selected</p>
      </div>
      <div className="card-body table-full-width table-responsive">
        <table className="table table-hover table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Image</th>
              <th>Units</th>
              <th>Total</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            { trs }      
          </tbody>
          <tfoot>
            <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Total:</td>
            <td>{total}</td>
            <td></td>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
    
    )
}

export default OrderTable;
