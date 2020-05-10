import React, {useState, useEffect} from 'react'
import Swal from "sweetalert2"
import get_localip from "../../helpers/get_localip"
import OrderRepo from "../../repository/order_repo"
import ProductRepo from "../../repository/product_repo"
import DateTime from "../../helpers/date_time"
import _ from "lodash"

const ipserver = get_localip() 

const OrderTable = ({order,set_order}) => {
  
  const [products, set_products] = useState(order.products)
  
  useEffect(() => {
    console.log("ordertable.useeffect.order",order)
    set_products(order.products)
  },[order,products]);

  const get_trs = products => products.map( product => (
    <tr key={DateTime.get_ymdhis()}>
      <td>{product.id}</td>
      <td>{product.descriptionFull}</td>
      <td><img 
            src={`http://${ipserver}:200/pictures/products/product_0.png`} 
            alt={product.descriptionFull}
            className="img-thumbnail"
            height="45" width="45"
            /></td>
      <td>{_.round(product.priceSale,2).toFixed(2)}</td>
      <td>
      <div className="input-group">
        <input type="number" className="form-control"  defaultValue={0} min="0" max="10"/>
        <button type="button" className="btn btn-primary btn-fill pull-left" prodid={product.id}>+</button>
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
              <th>Price</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            { trs }      
          </tbody>
        </table>
      </div>
    </div>
    )
}

export default OrderTable;
