//Navbar.js
import React, {useState} from 'react';
import { NavLink } from "react-router-dom";

function Navbar({iitems}) {

  return (
    <nav className="navbar navbar-expand">
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
              </NavLink>      
            </li>
          </ul>
      </div>
    </nav>
  )
}//Navbar()

export default Navbar;