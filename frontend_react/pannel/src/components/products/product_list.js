import React, {useState, useEffect} from 'react';
import axios from "axios"

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
    <ul>{list}</ul>
  )
}

export default ProductList;
