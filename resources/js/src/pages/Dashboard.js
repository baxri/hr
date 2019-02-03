import React, { Component } from 'react'
import { Route, Link, Switch } from "react-router-dom";
import PrivateRoute from '../routes/PrivateRoute';
import Settings from './Settings'
import Backups from './Backups'
import Layout from "../layouts/Layout";

export default class Dashboard extends Component {
    render() {
        return (
            <Layout title="Dashboard">

                <br />
                <br />
                <div className="container-fluid there-is-no">
                    <p className="text-center">There is no anything on dashboard :(</p>
                </div>
                {/* <Switch>
                    <Route path="/settings" component={Settings} />
                    <Route path="/" component={Backups} />
                </Switch> */}
            </Layout>
        )
    }
}