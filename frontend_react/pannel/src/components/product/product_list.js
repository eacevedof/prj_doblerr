import React, {useState, useEffect} from 'react';
import axios from "axios"
import Sidebar from "../common/sidebar"
import Navbar from "../common/navbar"
import Footer from "../common/footer"
import ProductSearch from "./forms/product_search"
import ProductTable from "./product_table"
import get_localip from "../../helpers/get_localip"

const ipserver = get_localip()

function ProductList({order,set_order}) {
  
  
  const [products, set_products] = useState([])

  const get_data = async() => {
    const url = `http://${ipserver}:200/products`
    console.log("url:",url,"products",products)
    //if(!products){
      const result = await axios(url)
      console.log("products")
      console.table(result.data)
      set_products(result.data)
    //}
  }

  useEffect(()=>{
      console.log("productlist.order",order)
      console.log("useEffect")
      get_data()
    },[])

  const list = products.map(product => <li key={product.id}>{product.descriptionFull}</li>)

  return (
    <div className="wrapper">
      <Sidebar />
      <div className="main-panel">
        <Navbar title="Products" />
        <div className="content">
          <div className="container-fluid">
            <ProductSearch />
            <ProductTable items={products} order={order} set_order={set_order} />
          </div>
        </div>
        <Footer />
      </div>
    </div>
  )
}

export default ProductList;
