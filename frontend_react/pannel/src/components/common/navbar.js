//Navbar.js
import React, {useState} from 'react';
import { NavLink } from "react-router-dom";

function Navbar({iitems}) {

  return (
    <nav className="navbar navbar-expand-sm">
      <div className="collapse navbar-collapse">
          <ul className="navbar-nav mr-auto">
            <li className="nav-item">
              <NavLink className="nav-link" to={"/react"}>
                <i className="nc-icon nc-cart-simple"></i>&nbsp;Products
              </NavLink>
            </li>            

            <li className="nav-item">
              <NavLink className="nav-link" to={"/order"}>
                  <i className="nc-icon nc-bullet-list-67"></i>&nbsp;Order
                  <span className="notification">5</span>
                  <span className="d-lg-none">Notification</span>
              </NavLink>      
            </li>
          </ul>
          <button type="submit" className="navbar-toggler navbar-toggler-right"
            data-toggle="collapse" aria-controls="navigation-index" 
            aria-expanded="false" aria-label="Toggle navigation"
            >
              <span className="navbar-toggler-bar burger-lines"></span>
              <span className="navbar-toggler-bar burger-lines"></span>
              <span className="navbar-toggler-bar burger-lines"></span>
          </button>
      </div>
    </nav>
  )
}//Navbar()

export default Navbar;