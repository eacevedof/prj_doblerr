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
            <Link to="/react">Dashboard</Link>
          </li>
        </ul>

        <Switch>
          <Route path="/react">
            <Dashboard />
          </Route>                    
        </Switch>
      </div>
    </Router>
  );
}//App

export default App;