//Navbar.js
import React, {useState, useEffect} from 'react';
import { NavLink } from "react-router-dom";
import "../../index.css"

function Navbar({order}) {
  console.log("navbar.order",order)

  const [iitems, set_iitems] = useState(0)

  useEffect(()=>{
    console.log("navbar.useeffect.order",order)
    if(order)
    {
      const i = order.products.length
      set_iitems(i)
    }
  },[order])

  return (
    <nav className="navbar navbar-expand">
      <div className="collapse navbar-collapse" id="navigation">
          <ul className="navbar-nav mr-auto">
            <li className="nav-item">
              <NavLink className="nav-link" activeClassName="navlink-active" to={"/react"}>
                <span><i className="nc-icon nc-bullet-list-67"></i>&nbsp;Products</span>
              </NavLink>
            </li>            

            <li className="nav-item dropdown">
              <NavLink className="nav-link" id="nav-order" activeClassName="navlink-active" to={"/order"}>
                  <span><i className="nc-icon nc-cart-simple"></i>&nbsp; Cart</span>
                  <span className="notification">{iitems}</span>
              </NavLink>
            </li>
          </ul>
      </div>
    </nav>
  )
}//Navbar()

export default Navbar;