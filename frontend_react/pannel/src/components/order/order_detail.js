import React from 'react';
import Sidebar from "../common/sidebar"
import Navbar from "../common/navbar"
import Footer from "../common/footer"
import OrderTable from "./order_table"
import "../../index.css"


function OrderDetail({order}) {
  return (
    <div className="wrapper">
      <div className="main-panel">
        <Navbar order={order} />
        <div className="content">
          <div className="container-fluid">
            <OrderTable order={order} />
          </div>
        </div>
        <Footer />
      </div>
    </div>
  )
}

export default OrderDetail;
