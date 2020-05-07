import React from 'react';

function Rowtop() {
  return (
    <div className="row">
      <div className="col-md-4">
          <div className="card ">
              <div className="card-header ">
                  <h4 className="card-title">Email Statistics</h4>
                  <p className="card-category">Last Campaign Performance</p>
              </div>
              <div className="card-body ">
                  <div id="chartPreferences" className="ct-chart ct-perfect-fourth"></div>
                  <div className="legend">
                      <i className="fa fa-circle text-info"></i> Open
                      <i className="fa fa-circle text-danger"></i> Bounce
                      <i className="fa fa-circle text-warning"></i> Unsubscribe
                  </div>
                  <hr />
                  <div className="stats">
                      <i className="fa fa-clock-o"></i> Campaign sent 2 days ago
                  </div>
              </div>
          </div>
      </div>
   
      <div className="col-md-8">
        <div className="card ">
            <div className="card-header ">
                <h4 className="card-title">Users Behavior</h4>
                <p className="card-category">24 Hours performance</p>
            </div>
            <div className="card-body ">
                <div id="chartHours" className="ct-chart"></div>
            </div>
            <div className="card-footer ">
                <div className="legend">
                    <i className="fa fa-circle text-info"></i> Open
                    <i className="fa fa-circle text-danger"></i> Click
                    <i className="fa fa-circle text-warning"></i> Click Second Time
                </div>
                <hr />
                <div className="stats">
                    <i className="fa fa-history"></i> Updated 3 minutes ago
                </div>
            </div>
        </div>
      </div>
    </div>
  )
}

export default Rowtop;
