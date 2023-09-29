import React from 'react';
import ApplicationLogo from '@/Components/ApplicationLogo';
import { Link } from '@inertiajs/inertia-react';

export default function Guest({ children }) {
    return (
        
        <div className="container-fluid h-100">
        <div className="oter-header">
           <div className="container-fluid">
              <div className="row no-margin">
                 <div className="col-sm-3 login-logo">
                    <img src={`../../assets/admin/images/logo.png`} alt="" />
                 </div>
              </div>
           </div>
        </div>
        <div className="row no-margin h-100">

        {children}
        
        </div>
      </div>
    );
}
