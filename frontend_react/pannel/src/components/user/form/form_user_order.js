import React from 'react';

function FormUserOrder({order,set_order}) {

  const on_submit = (e)=>{
    e.preventDefault()
    alert("send")
  }

  return (
    <form onSubmit={on_submit}>
           <div className="row">
                  <div className="col-md-5 pr-1">
                      <div className="form-group">
                          <label>Company (disabled)</label>
                          <input type="text" className="form-control" disabled="" placeholder="Company" />
                      </div>
                  </div>
                  <div className="col-md-3 px-1">
                      <div className="form-group">
                          <label>Username</label>
                          <input type="text" className="form-control" placeholder="Username" />
                      </div>
                  </div>
                  <div className="col-md-4 pl-1">
                      <div className="form-group">
                          <label htmlFor="exampleInputEmail1">Email address</label>
                          <input type="email" className="form-control" placeholder="Email" />
                      </div>
                  </div>
              </div>
              <div className="row">
                  <div className="col-md-6 pr-1">
                      <div className="form-group">
                          <label>First Name</label>
                          <input type="text" className="form-control" placeholder="Company"  />
                      </div>
                  </div>
                  <div className="col-md-6 pl-1">
                      <div className="form-group">
                          <label>Last Name</label>
                          <input type="text" className="form-control" placeholder="Last Name"  />
                      </div>
                  </div>
              </div>
              <div className="row">
                  <div className="col-md-12">
                      <div className="form-group">
                          <label>Address</label>
                          <input type="text" className="form-control" placeholder="Home Address"  />
                      </div>
                  </div>
              </div>
              <div className="row">
                <div className="col-md-4 pr-1">
                    <div className="form-group">
                        <label>City</label>
                        <input type="text" className="form-control" placeholder="City"  />
                    </div>
                </div>
                <div className="col-md-4 px-1">
                    <div className="form-group">
                        <label>Country</label>
                        <input type="text" className="form-control" placeholder="Country"  />
                    </div>
                </div>
                <div className="col-md-4 pl-1">
                  <div className="form-group">
                      <label>Postal Code</label>
                      <input type="number" className="form-control" placeholder="ZIP Code" />
                  </div>
                </div>
              </div>
              <div className="row">
                <div className="col-md-12">
                  <div className="form-group">
                    <label>About Me</label>
                    <textarea rows="4" cols="80" className="form-control" placeholder="Here can be your description" ></textarea>
                  </div>
                </div>
              </div>
              <button type="submit" className="btn btn-info btn-fill pull-right">Update Profile</button>
              <div className="clearfix"></div>
    </form>
  )
}

export default FormUserOrder;
