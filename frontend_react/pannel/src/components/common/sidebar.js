import React from 'react';


function Sidebar() {
  return (
      <div className="sidebar" data-image={process.env.PUBLIC_URL + '/assets/img/sidebar-5.jpg'}>
        <div className="sidebar-wrapper">
          <div className="logo">
              <a href="http://www.elchalanaruba.com" target="_blank" className="simple-text">
                El Chalán Aruba
              </a>
          </div>
          <ul className="nav">
              <li className="nav-item active">
                <a className="nav-link" href="/react">
                  <i className="nc-icon nc-chart-pie-35"></i>
                  <p>Products</p>
                </a>
              </li>
              <li>
                <a className="nav-link" href="/order">
                  <i className="nc-icon nc-cart-simple"></i>
                  <p>Order</p>
                </a>
              </li>
            </ul>
        </div>
      </div>
    )
  }//App()
  
  export default Sidebar;