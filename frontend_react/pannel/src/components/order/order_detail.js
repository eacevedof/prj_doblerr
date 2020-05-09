import React from 'react';
import Sidebar from "../common/sidebar"
import Navbar from "../common/navbar"
import Footer from "../common/footer"
import OrderTable from "./order_table"


function OrderDetail({order}) {
  return (
    <div className="wrapper">
      <Sidebar />
      <div className="main-panel">
        <Navbar title="Order" />
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
