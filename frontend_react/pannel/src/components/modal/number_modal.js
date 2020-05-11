import React, { useState, useEffect } from 'react';
import OrderRepo from "../../repository/order_repo"
import ProductRepo from "../../repository/product_repo"
import _ from "lodash"

function NumberModal({product,order,set_order}) {

  const [units, set_units] = useState(0)

  const on_add = ()=>{
    const prodid = product.id
    OrderRepo.order = _.clone(order,true)
    const orderunits = OrderRepo.get_units(prodid)
    console.log("on_add.orderunits",orderunits)
    const newunits = orderunits + 1
    set_units(newunits)
    console.log("on_add.units after set_units",newunits)
    const prodmodif = _.assign(product,{units:newunits})
    console.log("on_add.prodmodif",prodmodif)
    OrderRepo.add_product(prodmodif)
    set_order(OrderRepo.order)
    OrderRepo.save()
    //con las nuevas unidades se guarda el pedido en local
  }

  const on_remove = () => {
    const prodid = product.id
    OrderRepo.order = _.clone(order,true)
    const orderunits = OrderRepo.get_units(prodid)
    const newunits = orderunits>0?orderunits-1:0
    set_units(newunits)
    console.log("on_remove.units",newunits)
    const prodmodif = _.assign(product,{units:newunits})
    console.log("on_remove.prodmodif",prodmodif)
    OrderRepo.remove_product(prodmodif)
    set_order(OrderRepo.order)
    OrderRepo.save()
  }

  //useEffect(() => {
    //console.log("numbermodal.useeffect.product",product)
    //OrderRepo.order = _.clone(order,true)
    //const orderunits = OrderRepo.get_units(product.id)
    //set_units(orderunits)
  //},[order,units]);

  return (
    <>
    <div className="modal fade" id="number-modal" tabIndex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div className="modal-dialog" role="document">
        <div className="modal-content">
          <div className="modal-header">
            <h5 className="modal-title" id="exampleModalLabel"><b>{product.description}</b></h5>
            <button type="button" className="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div className="modal-body">
            <div className="form-group row">
              <div className="col-lg-6 col-md-6 col-sm-6 col-6">
                <label htmlFor="units" className="col-form-label">Units:</label>
                <input type="number" className="form-control" value={units} readOnly/>
              </div>
              <div className="col-lg-6 col-md-6 col-sm-6 col-6">
                <div className="row padding-buttons">
                  <div className="col-lg-6 col-md-6 col-sm-6 col-6">
                    <button type="button" className="btn btn-danger btn-fill btn-md pull-left" onClick={on_remove}>
                      <i className="fa fa-minus-square fa-lg" aria-hidden="true"></i> 
                    </button>            
                  </div>
                  <div className="col-lg-6 col-md-6 col-sm-6 col-6">
                    <button type="button" className="btn btn-success btn-fill btn-md pull-left" onClick={on_add}>
                      <i className="fa fa-plus-square fa-lg" aria-hidden="true"></i> 
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div className="modal-footer"></div>
        </div>
      </div>
    </div>
    </>
  )
}

export default NumberModal;
