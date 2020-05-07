//App.js
import React, {useState, useEffect} from 'react';
import Sidebar from "./components/common/sidebar"
import Navbar from "./components/common/navbar"

//import axios from 'axios'
console.log(Sidebar)

function App() {
  return (
    <div className="wrapper">
      {/* 
      <img src={process.env.PUBLIC_URL + '/assets/img/sidebar-5.jpg'} />  
      */}
      <Sidebar />
      <div className="main-panel">
        <Navbar />
      </div>
    </div>
  )
}//App()

export default App;