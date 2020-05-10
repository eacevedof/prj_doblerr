import React, {useEffect} from 'react'
import Swal from "sweetalert2"
import get_localip from "../../helpers/get_localip"
import OrderRepo from "../../repository/order_repo"
import ProductRepo from "../../repository/product_repo"
import LocalDb from "../../helpers/local_db"
import _ from "lodash"

const ipserver = get_localip() 

const ProductTable = ({order,set_order,products}) => {
  
  const i = 0

  const show_modal = objproduct =>{
    console.log(objproduct)
    Swal.fire({
      html: `
      <div className="card">
        <img className="card-img-top img-responsive" 
          src="http://192.168.1.129:200/pictures/products/product_0.png" alt="Card image cap"
        />
        <div className="card-body">
          <h5 className="card-title">${objproduct.description}</h5>
          <p className="card-text">
            ${objproduct.descriptionFull}
          </p>
        </div>
      </div>      
      `,
      input: 'text',
      inputAttributes: {
        autocapitalize: 'off'
      },
      showCancelButton: true,
      confirmButtonText: 'Look up',
      showLoaderOnConfirm: true,
      preConfirm: (login) => {
        alert("llama a endpo")
      },
      allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
      if (result.value) {
        Swal.fire({
          title: `${result.value.login}'s avatar`,
          imageUrl: result.value.avatar_url
        })
      }
    })
  }

  const add_to_order = (e)=>{
    OrderRepo.order = Object.assign({},order)
    ProductRepo.products = [...products]
    console.log("add_to_order.productrepo.products",ProductRepo.products)

    const button = e.currentTarget
    const prodid = parseInt(button.getAttribute("prodid"))
    console.log("prodid",prodid)
    const objproduct = ProductRepo.findById(prodid)
    console.log("add_to_order.objproduct",objproduct)
    show_modal(objproduct)
    OrderRepo.add_product(objproduct)

    console.log("OrderRepo.get_products",OrderRepo.get_products())
    set_order(OrderRepo.order)
    LocalDb.save("order",order)
    //OrderRepo.order.add_product()
    
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
        <button type="button" className="btn btn-primary btn-fill pull-left" onClick={add_to_order} prodid={product.id}>
          <i className="fa fa-cart-plus fa-lg" aria-hidden="true"></i>
        </button>
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
