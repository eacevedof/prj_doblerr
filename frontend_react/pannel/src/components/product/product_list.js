import React, {useState, useEffect} from 'react';
import axios from "axios"
import Sidebar from "../common/sidebar"
import Navbar from "../common/navbar"
import Footer from "../common/footer"
import ProductSearch from "./forms/product_search"
import ProductTable from "./product_table"

import HrefDom from "../../helpers/href_dom"
import Api from "../../providers/api"

function ProductList({order,set_order}) {
  
  const [products, set_products] = useState([])

  useEffect(()=>{
    HrefDom.document_title("ECH | products")

    async function load_products(){
      const response = await Api.get_async_products()
      if(response)
        if(response.status === 200)
          set_products(response.data)
    }
    load_products()
  },[])

  return (
    <div className="wrapper">
      <div className="main-panel">
        <Navbar order={order} />
        <div className="content">
          <div className="container-fluid">
            <ProductSearch />
            <ProductTable products={products} order={order} set_order={set_order} />
          </div>
        </div>
        <Footer />
      </div>
    </div>
  )
}

export default ProductList;
