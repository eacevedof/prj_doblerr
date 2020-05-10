import React, { useState, useEffect } from 'react';

function NumberModal({product,order,products}) {

  const [units, set_units] = useState(0)

  useEffect(() => {
    console.log("numbermodal.useeffect.product",product)
  },[order]);

  return (
    <>
    <div className="modal fade" id="number-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <input type="number" className="form-control" id="units" value={units} readOnly/>
              </div>
              <div className="col-lg-6 col-md-6 col-sm-6 col-6">
                <div className="row padding-buttons">
                  <div className="col-lg-6 col-md-6 col-sm-6 col-6">
                    <button type="button" className="btn btn-danger btn-fill btn-md pull-left">
                      <i className="fa fa-minus-square fa-lg" aria-hidden="true"></i> 
                    </button>            
                  </div>
                  <div className="col-lg-6 col-md-6 col-sm-6 col-6">
                    <button type="button" className="btn btn-success btn-fill btn-md pull-left">
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
