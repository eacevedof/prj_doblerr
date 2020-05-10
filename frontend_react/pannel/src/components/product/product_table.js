import React, {useEffect,setState, useState} from 'react'
import Swal from "sweetalert2"
import get_localip from "../../helpers/get_localip"
import OrderRepo from "../../repository/order_repo"
import ProductRepo from "../../repository/product_repo"
import LocalDb from "../../helpers/local_db"
import _ from "lodash"
import NumberModal from "../modal/number_modal"

const ipserver = get_localip() 

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

  const remove_from_order = ()=>{

  }

  useEffect(() => {
    console.log("producttable.useEffect.order",order)

  },[order]);


  const get_trs = products => products.map( (product,i) => (
    <tr key={product.id}>
      <td>{i+1}</td>
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
    <NumberModal product={selproduct} order={order} products={products} />
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
