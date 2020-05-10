import React,{useState} from 'react';
import LocalDb from "../../../helpers/local_db"
import styles from "./formsearch.module.css"

function ProductSearch() {

  const [search, set_search] = useState("")

  const on_submit = (e)=>{
    e.preventDefault()
    console.log("on submit search")
    LocalDb.dropdb()
  }

  return (
    <>
     <form onSubmit={on_submit}> 
      <div className="form-row align-items-center">
        <div className="col-md-6">
          <label className="sr-only" htmlFor="txt-search">Search</label>
          <div className="input-group mb-2">
            <input type="text" className="form-control" id="txt-search" placeholder="Search" />
          </div>
        </div>
        <div className="col-md-6">
          <button type="submit" className="btn btn-primary btn-fill pull-left">Go <i className="nc-icon nc-zoom-split"></i></button>
        </div>
      </div>
     </form>
     <hr/>
     </>
  )
}

export default ProductSearch;
