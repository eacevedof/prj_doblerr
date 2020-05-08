import React, {useState, useEffect} from 'react';
import axios from "axios"
import Sidebar from "../common/sidebar"
import Navbar from "../common/navbar"
import Footer from "../common/footer"

function ProductList() {
  
  const [products, set_products] = useState([])

  const get_data = async() => {
    const url = "http://localhost:200/products"
    console.log("url:",url,"products",products)
    //if(!products){
      const result = await axios(url)
      console.log("products",result.data)
      set_products(result.data)
    //}
  }

  useEffect(()=>{
      console.log("useEffect")
      get_data()
    },[])

  const list = products.map(product => <li key={product.id}>{product.descriptionFull}</li>)

  return (
    <div className="wrapper">
      <Sidebar />
      <div className="main-panel">
        <Navbar title="Dashboard" />
        <div className="content">
          <div className="container-fluid">
            {list}
          </div>
        </div>
        <Footer />
      </div>
    </div>
  )
}

export default ProductList;
