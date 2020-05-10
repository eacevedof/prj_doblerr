import React, {useEffect} from 'react';
import Sidebar from "../common/sidebar"
import Navbar from "../common/navbar"
import Footer from "../common/footer"
import OrderTable from "./order_table"
import "../../index.css"
import HrefDom from "../../helpers/href_dom"


function OrderDetail({order}) {

  useEffect(()=>{
    HrefDom.document_title("ECH | Order")
  },[])

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
