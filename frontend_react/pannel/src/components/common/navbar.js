//Navbar.js
import React, {useState} from 'react';
import { NavLink } from "react-router-dom";

function Navbar({iitems}) {

  return (
    <nav className="navbar navbar-expand-lg " color-on-scroll="500">
      <div className="container-fluid">

        <button className="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span className="navbar-toggler-bar burger-lines"></span>
          <span className="navbar-toggler-bar burger-lines"></span>
          <span className="navbar-toggler-bar burger-lines"></span>
        </button>

        <div className="collapse navbar-collapse justify-content-end" id="navigation">
          <ul className="nav navbar-nav mr-auto">
            <li className="dropdown nav-item">
                <NavLink className="nav-link" to="/order">
                  <i className="nc-icon nc-cart-simple"></i>
                  <span className="notification">{iitems}</span>
                  <span className="d-lg-none">Order</span>
                </NavLink>              
            </li>
          </ul>
        </div>
      </div>
    </nav>
  )
}//Navbar()

export default Navbar;