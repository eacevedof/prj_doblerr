//App.js
import React, {useState, useEffect} from 'react';
import Sidebar from "./components/common/sidebar"
import Navbar from "./components/common/navbar"
import Footer from "./components/common/footer"
import Graphics from "./components/dashboard/graphics"
import Profile from "./components/user/profile/profile"
//import axios from 'axios'

import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link,
  useRouteMatch,
  useParams
} from "react-router-dom";


function xpp() {
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
            <Profile />
          </div>
        </div>
        <Footer />
      </div>
    </div>
  )
}//xpp()

function App(){
  return (
    <Router>
      <div>
        <ul>
          <li>
            <Link to="/">Home</Link>
          </li>
          <li>
            <Link to="/about">About</Link>
          </li>
          <li>
            <Link to="/topics">Topics</Link>
          </li>
        </ul>

        <Switch>
          <Route path="/about">
            <About />
          </Route>
          <Route path="/topics">
            <Topics />
          </Route>
          <Route path="/">
            <Home />
          </Route>
        </Switch>
      </div>
    </Router>
  );
}//App

function About(){return (<>About</>)}
function Topics(){return (<>Topics</>)}
function Home(){return (<>Home</>)}

export default App;