//App.js
import React, {useState, useEffect} from 'react';
import Sidebar from "./components/common/sidebar"

//import axios from 'axios'
console.log(Sidebar)

function App() {
  return (
    <div>
      {/* 
      <img src={process.env.PUBLIC_URL + '/assets/img/sidebar-5.jpg'} />  
      */}
      <Sidebar/>
    </div>
  )
}//App()

export default App;