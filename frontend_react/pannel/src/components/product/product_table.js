import React from 'react'
import Swal from "sweetalert2"

const ProductTable = ({items}) => {
  
  const i = 0

  const add_to_order = ()=>{
    Swal.fire({
      title: 'Error!',
    text: 'Do you want to continue',
    icon: 'error',
    confirmButtonText: 'Cool'
    })
  }

  const remove_from_order = ()=>{
    Swal.fire({
      title: 'Error!',
    text: 'Do you want to continue',
    icon: 'error',
    confirmButtonText: 'Cool'
    })
  }


  const trs = items.map( product => (
    <tr key={product.id}>
      <td>{product.id}</td>
      <td>{product.descriptionFull}</td>
      <td><img 
            src={`http://localhost:200/pictures/products/product_0.png`} 
            alt={product.descriptionFull}
            className="img-thumbnail"
            height="45" width="45"
            /></td>
      <td>{product.priceSale}</td>
      <td>
      <div className="input-group">
        <input type="number" className="form-control"  defaultValue={i} min="0" max="10"/>
        <button type="submit" className="btn btn-primary btn-fill pull-left">save</button>
      </div>
      </td>
    </tr>
  ))
  
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
            {trs}              
          </tbody>
        </table>
      </div>
    </div>
    )
}

export default ProductTable;
