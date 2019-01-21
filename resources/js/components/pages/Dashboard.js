import React, { Component } from 'react'
import { Route, Link, Switch } from "react-router-dom";
import PrivateRoute from '../routes/PrivateRoute';
import Settings from './Settings'
import Backups from './Backups'

export default class Dashboard extends Component {
    render() {
        return (
            <div>
                <p>Dashboard</p>

                <Switch>
                    <Route path="/settings" component={Settings} />
                    <Route path="/" component={Backups} />
                </Switch>
            </div>
        )
    }
}