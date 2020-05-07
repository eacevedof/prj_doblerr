import React from 'react';

function Rowtop() {
  return (
    <div className="row">
      <div className="col-md-6">
          <div className="card ">
              <div className="card-header ">
                  <h4 className="card-title">2017 Sales</h4>
                  <p className="card-category">All products including Taxes</p>
              </div>
              <div className="card-body ">
                  <div id="chartActivity" className="ct-chart"></div>
              </div>
              <div className="card-footer ">
                  <div className="legend">
                      <i className="fa fa-circle text-info"></i> Tesla Model S
                      <i className="fa fa-circle text-danger"></i> BMW 5 Series
                  </div>
                  <hr/>
                  <div className="stats">
                      <i className="fa fa-check"></i> Data information certified
                  </div>
              </div>
          </div>
      </div>
      <div className="col-md-6">
          <div className="card  card-tasks">
              <div className="card-header ">
                  <h4 className="card-title">Tasks</h4>
                  <p className="card-category">Backend development</p>
              </div>
              <div className="card-body ">
                  <div className="table-full-width">
      
                  </div>
              </div>
              <div className="card-footer ">
                  <hr/>
                  <div className="stats">
                      <i className="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
                  </div>
              </div>
          </div>
      </div>
  </div>   
  )
}

export default Rowtop;
