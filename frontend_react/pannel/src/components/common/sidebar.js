import React from 'react';


function Sidebar() {
  return (
      <div className="sidebar" data-color="black">
        <div className="sidebar-wrapper">
          <div className="logo">
              <a href="http://www.elchalanaruba.com" target="_blank" className="simple-text">
                <b>El Chalán Aruba</b>
              </a>
          </div>
          <ul className="nav">
              <li className="nav-item active">
                <a className="nav-link" href="/react">
                  <i className="nc-icon nc-chart-pie-35"></i>
                  <b>Products</b>
                </a>
              </li>
            </ul>
        </div>
      </div>
    )
  }//App()
  
  export default Sidebar;