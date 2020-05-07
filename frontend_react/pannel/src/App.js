//App.js
import React, {useState, useEffect} from 'react';
import Sidebar from "./components/common/sidebar"
import Navbar from "./components/common/navbar"
import Footer from "./components/common/footer"
import Graphics from "./components/dashboard/graphics"
//import axios from 'axios'

function App() {
  return (
    <div className="wrapper">
      {/* 
      <img src={process.env.PUBLIC_URL + '/assets/img/sidebar-5.jpg'} />  
      */}
      <Sidebar />
      <div className="main-panel">
        <Navbar />
        <div className="content">
          <div className="container-fluid">
            <Graphics />
          </div>
        </div>
        <Footer />
      </div>
    </div>
  )
}//App()

export default App;