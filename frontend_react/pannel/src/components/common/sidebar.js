import React from 'react';


function Sidebar() {
    return (
        <div className="sidebar" data-image={process.env.PUBLIC_URL + '/assets/img/sidebar-5.jpg'}>
            
            <div className="sidebar-wrapper">
                <div className="logo">
                    <a href="http://www.creative-tim.com" className="simple-text">
                        Creative Tim
                    </a>
                </div>
                <ul className="nav">
                    <li className="nav-item active">
                        <a className="nav-link" href="dashboard.html">
                            <i className="nc-icon nc-chart-pie-35"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a className="nav-link" href="./user.html">
                            <i className="nc-icon nc-circle-09"></i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li>
                        <a className="nav-link" href="./table.html">
                            <i className="nc-icon nc-notes"></i>
                            <p>Table List</p>
                        </a>
                    </li>
                    <li>
                        <a className="nav-link" href="./typography.html">
                            <i className="nc-icon nc-paper-2"></i>
                            <p>Typography</p>
                        </a>
                    </li>
                    <li>
                        <a className="nav-link" href="./icons.html">
                            <i className="nc-icon nc-atom"></i>
                            <p>Icons</p>
                        </a>
                    </li>
                    <li>
                        <a className="nav-link" href="./maps.html">
                            <i className="nc-icon nc-pin-3"></i>
                            <p>Maps</p>
                        </a>
                    </li>
                    <li>
                        <a className="nav-link" href="./notifications.html">
                            <i className="nc-icon nc-bell-55"></i>
                            <p>Notifications</p>
                        </a>
                    </li>
                    <li className="nav-item active active-pro">
                        <a className="nav-link active" href="upgrade.html">
                            <i className="nc-icon nc-alien-33"></i>
                            <p>Upgrade to PRO</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    )
  }//App()
  
  export default Sidebar;