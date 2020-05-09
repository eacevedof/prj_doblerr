//App.js
import React, { useState } from 'react';
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
import objorder from "./models/order"


function App(){

  const [order, set_order] = useState(objorder)
  console.log("App.order ",order)

  return (
    <Router>
      <Switch>
        <Route path="/react">
          <ProductList order={order} set_order={set_order}/>
        </Route>
        <Route path="/order">
          <OrderDetail order={order} set_order={set_order}/>
        </Route>          
      </Switch>
    </Router>
  );
}//App

export default App;