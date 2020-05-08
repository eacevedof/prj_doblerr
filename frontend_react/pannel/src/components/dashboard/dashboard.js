import React from 'react';
import Sidebar from "../common/sidebar"
import Navbar from "../common/navbar"
import Footer from "../common/footer"
import Graphics from "../dashboard/graphics"
import Profile from "../user/profile/profile"

function Dashboard() {
  return (
    <div className="wrapper">
      {/* 
      <img src={process.env.PUBLIC_URL + '/assets/img/sidebar-5.jpg'} />  
      */}
      <Sidebar />
      <div className="main-panel">
        <Navbar title="Dashboard" />
        <div className="content">
          <div className="container-fluid">
            <Graphics />
            <Profile />
          </div>
        </div>
        <Footer />
      </div>
    </div>
  )
}

export default Dashboard;
