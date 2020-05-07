//App.js
import React, {useState, useEffect} from 'react';
import Dashboard from "./components/dashboard/dashboard"

//import axios from 'axios'

import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link,
  useRouteMatch,
  useParams
} from "react-router-dom";

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
          <li>
            <Link to="/dashboard">Dashboard</Link>
          </li>          
        </ul>

        <Switch>
          <Route path="/dashboard">
            <Dashboard />
          </Route>                    
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