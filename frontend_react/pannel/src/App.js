//App.js
import React, {useState, useEffect} from 'react';
import Dashboard from "./components/dashboard/dashboard"
import UserDetail from "./components/user/user_detail"
//import axios from 'axios'
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link,
  useRouteMatch,
  useParams
} from "react-router-dom";
import ProductList from './components/products/product_list';

function App(){
  return (
    <Router>
      <>
        <Switch>
          <Route path="/react">
            <ProductList />
          </Route>
        </Switch>
      </>
    </Router>
  );
}//App

export default App;