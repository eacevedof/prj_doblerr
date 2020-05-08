//Navbar.js
import React, {useState} from 'react';

function Navbar({title,iitems}) {

  return (
    <nav className="navbar navbar-expand-lg " color-on-scroll="500">
      <div className="container-fluid">
        <a className="navbar-brand" href="/react"> {title} </a>
        <button className="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span className="navbar-toggler-bar burger-lines"></span>
          <span className="navbar-toggler-bar burger-lines"></span>
          <span className="navbar-toggler-bar burger-lines"></span>
        </button>
        <div className="collapse navbar-collapse justify-content-end" id="navigation">
          <ul className="nav navbar-nav mr-auto">
            <li className="dropdown nav-item">
              <a href="/order" className="nav-link">
                  <i className="nc-icon nc-cart-simple"></i>
                  <span className="notification">{iitems}</span>
                  <span className="d-lg-none">Cart</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  )
}//Navbar()

export default Navbar;