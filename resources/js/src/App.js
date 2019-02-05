import React, { Component } from 'react';
import ReactDOM from 'react-dom'
import { BrowserRouter as Router, Route, Link, Switch } from "react-router-dom";
import PrivateRoute from './routes/PrivateRoute';
import PublicRoute from './routes/PublicRoute';
import { ToastContainer, toast } from 'react-toastify';

import Login from './pages/Login';
import Dashboard from './pages/Dashboard';

import EmployeeIndex from './pages/employees/index';
import StoresIndex from './pages/stores/index';

class App extends Component {
    render() {
        return (
            <Router>
                <Switch>
                    <PublicRoute exact path="/login" component={Login} />
                    <PrivateRoute path="/employees/" component={EmployeeIndex} />
                    <PrivateRoute path="/stores/" component={StoresIndex} />
                    <PrivateRoute path="/dashboard" component={Dashboard} />
                    <PrivateRoute path="/" component={Dashboard} />
                </Switch>
                
            </Router>
        );
    }
}

ReactDOM.render(<App/>, document.getElementById('app'));
