import React from 'react';

function footer() {
  return (
    <footer className="footer">
      <div className="container-fluid">
        <nav>
          <p className="copyright text-center">
              © {new Date().getFullYear()} 
              <a href="http://www.elchalanaruba.com" target="_blank"> El Chalán Aruba</a>
          </p>
        </nav>
      </div>
    </footer>    
  )
}

export default footer;


