import React from 'react';
import Sidebar from "../common/sidebar"
import Navbar from "../common/navbar"
import Footer from "../common/footer"

const order = {}

function OrderDetail() {
  return (
    <div className="wrapper">
      <Sidebar />
      <div className="main-panel">
        <Navbar title="Order" />
        <div className="content">
          <div className="container-fluid">
            {order.toString()}
          </div>
        </div>
        <Footer />
      </div>
    </div>
  )
}

export default OrderDetail;
