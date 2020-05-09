//Navbar.js
import React, {useState, useEffect} from 'react';
import { NavLink } from "react-router-dom";

function Navbar({order}) {
  console.log("navbar.order",order)

  const [iitems, set_iitems] = useState(0)

  useEffect(()=>{
    console.log("navbar.useeffect.order",order)
    const i = order.products.length
    set_iitems(i)
  })

  return (
    <nav className="navbar navbar-expand">
      <div className="collapse navbar-collapse">
          <ul className="navbar-nav mr-auto">
            <li className="nav-item">
              <NavLink className="nav-link" activeClassName="active" to={"/react"}>
                <i className="nc-icon nc-cart-simple"></i>&nbsp;Products
              </NavLink>
            </li>            

            <li className="nav-item">
              <NavLink className="nav-link" activeClassName="active" to={"/order"}>
                  <i className="nc-icon nc-bullet-list-67"></i>&nbsp;Order
                  <span className="notification">{iitems}</span>
              </NavLink>      
            </li>
          </ul>
      </div>
    </nav>
  )
}//Navbar()

export default Navbar;