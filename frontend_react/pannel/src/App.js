//App.js
import React, { useState, useEffect } from 'react';
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
import LocalDb from "./helpers/local_db"

function App(){



  const [order, set_order] = useState(objorder)
  console.log("App.order ",order)

  useEffect(() => {
    console.log("app.useffect")
    if(order.products.length === 0){
      const dborder = LocalDb.select("order")
      if(dborder.products.length>0)
        console.log("app.useeffect.dborder",dborder)
        set_order(dborder)
    }
  }, []);

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