import React, {useEffect, useState} from 'react'
import OrderRepo from "../../repository/order_repo"
import ProductRepo from "../../repository/product_repo"
import _ from "lodash"
import NumberModal from "../modal/number_modal"

const BASE_URL = process.env.REACT_APP_BASEURLAPI

const ProductTable = ({order, set_order, products}) => {
  
  const [selproduct,set_selproduct] = useState({})

  const show_modal = (e)=>{
    OrderRepo.order = _.clone(order,true)
    ProductRepo.products = _.clone(products,true)

    const button = e.currentTarget
    const prodid = parseInt(button.getAttribute("prodid"))
    const objproduct = ProductRepo.findById(prodid)

    set_selproduct(objproduct)        
  }


  useEffect(() => {
    console.log("producttable.useEffect.order",order)
  },[products]);


  const get_trs = products => products.map( (product,i) => (
    <tr key={product.id}>
      <td>{i+1}</td>
      <td>{product.descriptionFull}</td>
      <td><img 
            src={`${BASE_URL}/pictures/products/product_0.png`} 
            alt={product.descriptionFull}
            className="img-thumbnail"
            height="45" width="45"
            /></td>
      <td>{_.round(product.priceSale,2).toFixed(2)}</td>
      <td>
      <div className="input-group">
        <button type="button" 
          className="btn btn-primary btn-fill pull-left" 
          onClick={show_modal} prodid={product.id} 
          data-toggle="modal"
          data-target="#number-modal"
          >
          <i className="fa fa-cart-plus fa-lg" aria-hidden="true"></i>
        </button>
      </div>
      </td>
    </tr>
  ))//get_trs

  const trs = get_trs(products)
  
  return (
    <>
    <NumberModal product={selproduct} order={order} set_order={set_order} />
    <div className="card strpied-tabled-with-hover">
      <div className="card-header ">
          <h4 className="card-title">Products</h4>
          <p className="card-category">tags applied</p>
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
    </>
    )
}

export default ProductTable;
