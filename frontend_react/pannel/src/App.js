//App.js
import React from 'react';
import {
  BrowserRouter as Router,
  Switch,
  Route,
  Link,
  useRouteMatch,
  useParams
} from "react-router-dom";
import ProductList from './components/product/product_list';
import OrderDetail from "./components/order/order_detail"

console.log("App.js")

function App(){
  return (
    <Router>
      <>
        <Switch>
          <Route path="/react">
            <ProductList />
          </Route>
          <Route path="/order">
            <OrderDetail />
          </Route>          
        </Switch>
      </>
    </Router>
  );
}//App

export default App;