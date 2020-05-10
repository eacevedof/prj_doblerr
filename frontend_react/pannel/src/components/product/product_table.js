import React, {useEffect} from 'react'
import Swal from "sweetalert2"
import get_localip from "../../helpers/get_localip"
import OrderRepo from "../../repository/order_repo"
import ProductRepo from "../../repository/product_repo"

const ipserver = get_localip() 

const ProductTable = ({order,set_order,products}) => {
  
  const i = 0

  const add_to_order = (e)=>{
    //alert("ok")
    OrderRepo.order = Object.assign({},order)
    ProductRepo.products = products
    //console.log(ProductRepo.products)

    const prodid = parseInt(e.target.getAttribute("prodid"))
    const objproduct = ProductRepo.findById(prodid)
    OrderRepo.order.products.push(objproduct)

    console.log("OrderRepo.order",OrderRepo.order.products)
    console.log("Order global",order.products)
    set_order(OrderRepo.order)
    //OrderRepo.order.add_product()
    
  }

  const remove_from_order = ()=>{

  }

  useEffect(() => {
    console.log("producttable.useEffect")

  },[order]);


  const get_trs = products => products.map( product => (
    <tr key={product.id}>
      <td>{product.id}</td>
      <td>{product.descriptionFull}</td>
      <td><img 
            src={`http://${ipserver}:200/pictures/products/product_0.png`} 
            alt={product.descriptionFull}
            className="img-thumbnail"
            height="45" width="45"
            /></td>
      <td>{product.priceSale}</td>
      <td>
      <div className="input-group">
        <input type="number" className="form-control"  defaultValue={i} min="0" max="10"/>
        <button type="button" className="btn btn-primary btn-fill pull-left" onClick={add_to_order} prodid={product.id}>+</button>
      </div>
      </td>
    </tr>
  ))//get_trs

  const trs = get_trs(products)
  
  return (
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
    )
}

export default ProductTable;
